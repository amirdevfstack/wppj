<?php
class EventAdmin
{
        public function __construct()
        {
            add_action('init', array($this, 'register_event_post_type'));
            add_action('add_meta_boxes', array($this, 'add_event_meta_boxes'));
            add_action('save_post', array($this, 'save_event_meta'), 10, 2);
            add_filter('post_row_actions', array($this, 'add_duplicate_event_link'), 10, 2);
            add_filter('manage_event_posts_columns', array($this, 'add_event_columns'));
            add_action('manage_event_posts_custom_column', array($this, 'custom_event_column'), 10, 2);
            add_action('admin_action_duplicate_event', array($this, 'duplicate_event'));
       }



    public function register_event_post_type()
    {
        $args = array(
            'labels' => array(
                'name' => __('Events'),
                'singular_name' => __('Event')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
            'rewrite' => array('slug' => 'events'),
            'show_in_rest' => true,
        );
        register_post_type('event', $args);
    }


    public function add_event_meta_boxes()
    {
        add_meta_box('event_details', __('Event Details'), array($this, 'event_meta_box_callback'), 'event');
    }

    public function add_duplicate_event_link($actions, $post)
    {
        if ($post->post_type === 'event') {
            $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=duplicate_event&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce') . '" title="Duplicate this event" rel="permalink">Duplicate</a>';
        }
        return $actions;
    }


    public function duplicate_event()
    {
        if (!(isset($_GET['post']) || isset($_POST['post']) && (isset($_GET['action']) && $_GET['action'] == 'duplicate_event'))) {
            wp_die('No event to duplicate has been supplied!');
        }

        $post_id = (isset($_GET['post']) ? $_GET['post'] : $_POST['post']);
        $post = get_post($post_id);
        $current_user = wp_get_current_user();
        $new_post_id = wp_insert_post(array(
            'post_title' => 'Copy of ' . $post->post_title,
            'post_content' => $post->post_content,
            'post_status' => 'draft',
            'post_type' => $post->post_type,
            'post_author' => $current_user->ID,
            'post_date' => current_time('mysql'),
        ));

        if ($new_post_id) {
            $meta_data = get_post_custom($post_id);
            foreach ($meta_data as $key => $values) {
                foreach ($values as $value) {
                    add_post_meta($new_post_id, $key, $value);
                }
            }
            wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
            exit;
        } else {
            wp_die('Error creating duplicate event');
        }
    }

    public function add_event_columns($columns)
    {
        $columns['event_date'] = __('Date Created');
        return $columns;
    }

    public function custom_event_column($column, $post_id)
    {
        switch ($column) {
            case 'event_date':
                echo get_the_date('', $post_id);
                break;
        }
    }

    
    public function event_meta_box_callback($post)
    {
        wp_nonce_field('save_event_details', 'event_details_nonce');

        // Create fields for event details
        $fields = [
            'start_date' => ['type' => 'date', 'label' => 'Start Date'],
            'end_date' => ['type' => 'date', 'label' => 'End Date'],
            'location_name' => ['type' => 'text', 'label' => 'Location Name'],
            'location_address' => ['type' => 'text', 'label' => 'Location Address'],
            'latitude' => ['type' => 'number', 'label' => 'Latitude'],
            'longitude' => ['type' => 'number', 'label' => 'Longitude'],
            'organizer_name' => ['type' => 'text', 'label' => 'Organizer Name'],
            'organizer_phone' => ['type' => 'tel', 'label' => 'Organizer Phone'],
            'organizer_email' => ['type' => 'email', 'label' => 'Organizer Email'],
            'organizer_url' => ['type' => 'url', 'label' => 'Organizer URL'],
            'cover_image_url' => ['type' => 'url', 'label' => 'Cover Image URL'],
            'event_url' => ['type' => 'url', 'label' => 'Event URL'],
            'category' => ['type' => 'text', 'label' => 'Category'],
            'ticket_url' => ['type' => 'url', 'label' => 'Ticket URL'],
            'status' => [
                'type' => 'dropdown',
                'label' => 'Status',
                'options' => [
                    'EventScheduled' => 'Scheduled',
                    'EventCancelled' => 'Cancelled',
                    'EventPostponed' => 'Postponed',
                    'EventRescheduled' => 'Rescheduled',
                    'EventMovedOnline' => 'Moved Online'
                ]
            ],
            'price' => ['type' => 'number', 'label' => 'Price'],
            'currency' => [
                'type' => 'dropdown',
                'label' => 'Currency',
                'options' => ['USD' => 'USD', 'EUR' => 'EUR', 'GBP' => 'GBP']
            ],
            'event_attendance_mode' => [
                'type' => 'dropdown',
                'label' => 'Event Attendance Mode',
                'options' => [
                    'OfflineEventAttendanceMode' => 'Offline',
                    'OnlineEventAttendanceMode' => 'Online',
                    'MixedEventAttendanceMode' => 'Mixed'
                ]
            ],
            'performer_name' => ['type' => 'text', 'label' => 'Performer Name'],
            'performer_type' => [
                'type' => 'dropdown',
                'label' => 'Performer Type',
                'options' => [
                    'Person' => 'Individual',
                    'MusicGroup' => 'Music Group',
                    'SportsTeam' => 'Sports Team',
                    'Organization' => 'Organization'
                ]
            ],
            'facebook' => ['type' => 'url', 'label' => 'Facebook'],
            'instagram' => ['type' => 'url', 'label' => 'Instagram'],
            'google' => ['type' => 'url', 'label' => 'Google'],
            'tiktok' => ['type' => 'url', 'label' => 'TikTok'],
            'twitter' => ['type' => 'url', 'label' => 'Twitter'],
            'linkedin' => ['type' => 'url', 'label' => 'LinkedIn'],
        ];

        // Output fields
        foreach ($fields as $field_key => $field_info) {
            $value = get_post_meta($post->ID, $field_key, true);
            $label = $field_info['label'];

            echo "<p><label for='{$field_key}'>" . esc_html($label) . ":</label> ";
			$readonly="";
			if($field_key=="latitude" || $field_key=="longitude"){
				$readonly="readonly";
			}
            // Check the field type
            switch ($field_info['type']) {
                case 'dropdown':
                    echo "<select id='{$field_key}' name='{$field_key}' class='widefat'>";
                    foreach ($field_info['options'] as $option_value => $option_label) {
                        $selected = ($value == $option_value) ? 'selected' : '';
                        echo "<option value='{$option_value}' {$selected}>" . esc_html($option_label) . "</option>";
                    }
                    echo "</select>";
                    break;
                case 'date':
                    // Class 'datetime-picker' will need to be defined for your date/time picker plugin
                    echo "<input type='text' id='{$field_key}' name='{$field_key}' value='" . esc_attr($value) . "' class='widefat datetime-picker' />";
                    break;
                default:
                    $type = $field_info['type'];
                    echo "<input type='{$type}' id='{$field_key}' name='{$field_key}' value='" . esc_attr($value) . "' ".$readonly." class='widefat' />";
                    break;
            }
            echo "</p>";
        }
    }

    public function save_event_meta($post_id, $post)
    {
        // Check nonce
        if (!isset($_POST['event_details_nonce']) || !wp_verify_nonce($_POST['event_details_nonce'], 'save_event_details')) {
            return;
        }

        // Check if autosave
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        // Check user permissions
        if ('event' === $_POST['post_type'] && !current_user_can('edit_post', $post_id)) {
            return;
        }

        // Save/update metadata
        $fields = [
            'start_date',
            'end_date',
            'location_name',
            'location_address',
            'latitude',
            'longitude',
            'organizer_name',
            'organizer_phone',
            'organizer_email',
            'organizer_url',
            'cover_image_url',
            'event_url',
            'category',
            'ticket_url',
            'status',
            'price',
            'currency',
            'event_attendance_mode',
            'performer_name',
            'performer_type',
            'facebook',
            'instagram',
            'google',
            'tiktok',
            'twitter',
            'linkedin'
        ];

        foreach ($fields as $field) {
            if (array_key_exists($field, $_POST)) {
                update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
            }
        }
    }
}

// Initialize the EventAdmin class
new EventAdmin();
