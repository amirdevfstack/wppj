<?php
class PublicAuthenticationForm
{
    private $error_message = '';
    private $success_message = ''; 
    public function __construct()
    {
       if (!is_admin()) {
        add_shortcode('tnc_authentication_form', array($this, 'render_forms'));
        add_action('init', array($this, 'handle_form_submission'));
        add_action('init', array($this, 'redirect_wp_login'));
        add_action('init', array($this, 'handle_reset_password'));
        add_action('init', array($this, 'add_ajax_hooks'));
        add_action('init', array($this, 'custom_login_private'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_custom_scripts')); 
       }
    }

    public function enqueue_custom_scripts() {
       
        wp_enqueue_script('jquery');
        wp_enqueue_script('custom-script-private-profile', get_template_directory_uri() . '/public/theme/js/private-profile.js', array('jquery'), '1.0', true);
       wp_localize_script('custom-script-private-profile', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
    }

    public function add_ajax_hooks() {
        add_action('wp_ajax_update_password', array($this, 'handle_password_update'));      
        add_action('wp_ajax_nopriv_update_password', array($this, 'handle_password_update'));
    }
 
    public function redirect_wp_login()
    {
        if (!current_user_can('administrator') && !current_user_can('manage_network')) {
            $page_viewed = basename($_SERVER['REQUEST_URI']);        
            if ($page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET' && !isset($_GET['action'])) {
                wp_redirect(home_url('/members/?form=login')); 
                exit;
            }
        }
    }
    
    public function render_login_form()
    {
        if (is_user_logged_in()) {
            return '<p>You are already logged in.</p>';
        }
    
        $form_action = esc_url($_SERVER['REQUEST_URI']);
        $error_html = $this->error_message ? '<div class="alert alert-danger">' . $this->error_message . '</div>' : '';
        $success_html = $this->success_message ? '<div class="alert alert-success">' . $this->success_message . '</div>' : '';
    
        $form_html = '<form method="post" id="login-form" class="bootstrap-login-form">
            ' . $error_html . '
            ' . $success_html . '
            <div class="form-group">
                <label class="text-dark" for="user_login">Username or Email Address</label>
                <input type="text" class="form-control" id="user_login" name="log" required>
            </div>
            <div class="form-group">
                <label class="text-dark" for="user_pass">Password</label>
                <input type="password" class="form-control" id="user_pass" name="pwd" required>
            </div>
            <div class="form-group">
                <input type="hidden" name="action" value="tnc_login"> <!-- Add the action field here -->
                <input type="submit" class="btn btn-primary btn-block" value="Log In">
                <input type="hidden" name="redirect_to" value="' . esc_url($form_action) . '">
            </div>
        </form>
        <p class="text-dark">Need an account? <a href="' . esc_url(add_query_arg('form', 'register', strtok($_SERVER["REQUEST_URI"], '?'))) . '">Register</a>.</p>
        <p class="text-dark">Forgot your password? <a href="' . esc_url(add_query_arg('form', 'reset_password', strtok($_SERVER["REQUEST_URI"], '?'))) . '">Reset Password</a>.</p>';
    
        return $form_html;
    } 
    
    public function custom_login_private(){
        if(isset($_POST['log']) && isset($_POST['pwd'])){
            $_SESSION['redirect_after_login'] = esc_url($_SERVER['REQUEST_URI']);
            $creds = array();
            $creds['user_login'] = $_POST['log'];
            $creds['user_password'] = $_POST['pwd'];
            $creds['remember'] = true; 
            $user = wp_signon( $creds, false );
            if ( is_wp_error($user) ) {
                $this->error_message = $user->get_error_message();
                return;
            }
           
            if (in_array('administrator', (array) $user->roles)) {
                wp_redirect(admin_url());
                exit;
            }
            
            $redirect_url = isset($_SESSION['redirect_after_login']) ? $_SESSION['redirect_after_login'] : home_url('/');
            wp_redirect($redirect_url);
            exit;
        }
    }
    

    public function render_registration_form()
    {
       
        $error_html = $this->error_message ? '<div class="alert alert-danger">' . $this->error_message . '</div>' : '';
    
        
        $nonce_field = wp_nonce_field('tnc_register_action', '_wpnonce_register', true, false);
    
        $form_html = '
        <form action="' . esc_url($_SERVER['REQUEST_URI']) . '" method="post" class="bootstrap-registration-form">
            ' . $nonce_field . ' 
            <div class="form-group">
                <label class="text-dark" for="reg_email">Email Address</label>
                <input type="email" class="form-control" id="reg_email" name="reg_email" required>
            </div>
            <div class="form-group">
                <label class="text-dark" for="reg_username">Username</label>
                <input type="text" class="form-control" id="reg_username" name="reg_username" required>
            </div>
            <div class="form-group">
                <label class="text-dark" for="reg_password">Password</label>
                <input type="password" class="form-control" id="reg_password" name="reg_password" required>
            </div>
            <div class="form-group">
                <label class="text-dark">
                    <input type="checkbox" name="privacy_policy" required> Accept Privacy Policy
                </label>
            </div>
            <div class="form-group">
                <label class="text-dark">
                    <input type="checkbox" name="terms_of_service" required> Accept Terms of Service
                </label>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" value="Register">
                <input type="hidden" name="action" value="tnc_register">
            </div>
        </form>
        <p class="text-dark">Already have an account? <a href="' . esc_url(add_query_arg('form', 'login', strtok($_SERVER["REQUEST_URI"], '?'))) . '">Log in</a>.</p>';
    
        $form_html = $error_html . $form_html;
    
        return $form_html;
    }
    

    public function handle_form_submission()
    {
        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            if (isset($_POST['action']) && $_POST['action'] === 'tnc_register') {
                if (!isset($_POST['_wpnonce_register']) || !wp_verify_nonce($_POST['_wpnonce_register'], 'tnc_register_action')) {
                    $this->error_message = 'Security check failed';
                    return; 
                }

                $username = sanitize_user($_POST['reg_username']);
                $email = sanitize_email($_POST['reg_email']);
                $password = $_POST['reg_password'];

                if (empty($username) || empty($email) || empty($password)) {
                    $this->error_message = 'Please complete all registration fields.';
                    return;
                }

                if (username_exists($username) || email_exists($email)) {
                    $this->error_message = 'Username or email already exists.';
                    return;
                }

                if (!isset($_POST['privacy_policy']) || !isset($_POST['terms_of_service'])) {
                    $this->error_message = 'Please accept both Privacy Policy and Terms of Service.';
                    return;
                }

                $user_id = wp_create_user($username, $password, $email);

                if (is_wp_error($user_id)) {
                    $this->error_message = $user_id->get_error_message();
                } else {
                   
                    wp_set_current_user($user_id);
                    wp_set_auth_cookie($user_id);
                    wp_redirect(home_url());
                    exit;
                }
            }
        }
    }

   
    public function render_forms()
    {
        if (is_user_logged_in()) {
            return '<p>You are already logged in.</p>';
        }
        if (isset($_GET['action']) && $_GET['action'] === 'rp' && isset($_GET['key']) && isset($_GET['login'])) {
            return $this->render_custom_reset_password_form();
        }
        $form_to_show = isset($_GET['form']) ? $_GET['form'] : 'login';

        if ($form_to_show === 'register') {
            return $this->render_registration_form();
        } elseif ($form_to_show === 'reset_password') {
            return $this->render_reset_password_form();
        } else {
            return $this->render_login_form();
        }
    }



    public function handle_reset_password()
    {
        if ('POST' === $_SERVER['REQUEST_METHOD'] && isset($_POST['action']) && $_POST['action'] === 'reset_password') {
            $user_login = isset($_POST['user_login']) ? sanitize_text_field($_POST['user_login']) : '';
    
            if (empty($user_login)) {
                $this->error_message = 'Please enter your username or email.';
                return;
            }
            $user = get_user_by('login', $user_login);
            if (!$user) {
                $user = get_user_by('email', $user_login);
                if (!$user) {
                    $this->error_message = 'User not found.';
                    return;
                }
            }  
            $reset_key = get_password_reset_key($user);
            if (is_wp_error($reset_key)) {
                $this->error_message = 'Error generating password reset key.';
                return;
            }
    
            $reset_url = add_query_arg(
                array(
                    'action' => 'rp',
                    'key' => $reset_key,
                    'login' => rawurlencode($user->user_login),
                ),
                home_url($_SERVER['REQUEST_URI']) 
            );
    
            $subject = 'Password Reset';
            $message = 'Please click the following link to reset your password: ' . $reset_url;
            $headers = array('Content-Type: text/html; charset=UTF-8');
    
            $mailed = wp_mail($user->user_email, $subject, $message, $headers);
            if ($mailed) {
                $this->success_message = 'Password reset email sent.';
            } else {
                $this->error_message = 'Error sending password reset email.';
                return;
            }
            wp_redirect(home_url($_SERVER['REQUEST_URI']));
            exit;
        }
    }
    

      public function render_reset_password_form()
      {
        $error_html = $this->error_message ? '<div class="alert alert-danger">' . $this->error_message . '</div>' : '';

        $form_html = '
        <form action="' . esc_url($_SERVER['REQUEST_URI']) . '" method="post" class="bootstrap-reset-password-form">
            <div class="form-group">
                <label class="text-dark" for="user_login">Username or Email Address</label>
                <input type="text" class="form-control" id="user_login" name="user_login" required>
            </div>
            <div class="form-group">
                <input type="hidden" name="action" value="reset_password">
                <input type="submit" class="btn btn-primary btn-block" value="Reset Password">
            </div>
        </form>';

        $form_html = $error_html . $form_html; 
        return $form_html;
      }

  
      public function render_custom_reset_password_form()
      {
        
            if (isset($_SESSION['password_reset_success']) && $_SESSION['password_reset_success'] === true) {
            
                $reset_success_message = '<p>Password reset successful!</p>';
                unset($_SESSION['password_reset_success']); 
            } else {
                $reset_success_message = ''; 
            }
        
        
            if (isset($_GET['key']) && isset($_GET['login'])) {
                $user_login = $_GET['login'];
                $reset_key = $_GET['key'];
        
                $user = check_password_reset_key($reset_key, $user_login);
        
                if (is_wp_error($user)) {
                    return '<p class="text-danger text-center">' . esc_html__('Invalid or expired reset link.', 'mindscape') . '</p>';
                }
            
                
                    $form_html = '
                    ' . $reset_success_message . '
                    <form id="reset-password-form" class="bootstrap-reset-password-form">
                        <input type="hidden" name="action" value="update_password">
                        <input type="hidden" name="user_login" value="' . esc_attr($user_login) . '">
                        <input type="hidden" name="reset_key" value="' . esc_attr($reset_key) . '">
                        <div class="form-group">
                            <label for="new_password" class="text-dark">' . esc_html__('New Password', 'mindscape') . '</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_new_password" class="text-dark">' . esc_html__('Confirm New Password', 'mindscape') . '</label>
                            <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="' . esc_attr__('Reset Password', 'mindscape') . '">
                            <div id="error-message" style="color: red;"></div>
                        </div>
                    </form>
                    ';
                    return $form_html;


            } else {
                return '<p class="text-danger">' . esc_html__('Invalid password reset link.', 'mindscape') . '</p>';
            }
      }
    
      public function handle_password_update() {
    
        $user_login = isset($_POST['user_login']) ? sanitize_text_field($_POST['user_login']) : '';
        $reset_key = isset($_POST['reset_key']) ? sanitize_text_field($_POST['reset_key']) : '';
        $user = get_user_by('login', $user_login);
        if (!$user) {
            wp_send_json_error('User not found.');
        }
        if (!check_password_reset_key($reset_key, $user_login)) {
            wp_send_json_error('Invalid or expired reset key.');
        }
        $new_password = isset($_POST['new_password']) ? $_POST['new_password'] : '';
        $confirm_new_password = isset($_POST['confirm_new_password']) ? $_POST['confirm_new_password'] : '';
        if (strlen($new_password) < 8 || strlen($confirm_new_password) < 8) {
            wp_send_json_error('Password must be at least 8 characters long.');
        }
    
        if ($new_password !== $confirm_new_password) {
        
            wp_send_json_error('Passwords do not match.');
        }
        $result = wp_set_password($new_password, $user->ID);
        wp_send_json_success('Password updated successfully!');
      }

}