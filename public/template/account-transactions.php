<?php

class AccountTransaction
{
    private $wpdb;
    private $table_name;

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table_name = $wpdb->prefix . 'tnc_dutchie_transaction';

        // Register AJAX handlers
        add_action('wp_ajax_fetch_customer_transaction', array($this, 'fetchCustomerTransactionAjax'));
        add_action('wp_enqueue_scripts', array($this, 'enqueueUserScripts'));
    }

    public function enqueueUserScripts() {
        wp_enqueue_script('jquery'); // Enqueue jQuery if needed
        wp_enqueue_script('trees-n-clouds-transactions', get_template_directory_uri() . '/public/theme/js/transactions.js', array('jquery'), '1.0', true);
        
        $script_data = array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'action' => 'fetch_customer_transaction'
        );

        wp_localize_script('trees-n-clouds-transactions', 'treesNCloudsAjax', $script_data);
    }

    public function fetchCustomerTransactionAjax() {
        // Ensure the user is logged in
        if (!is_user_logged_in()) {
            wp_send_json_error('User not logged in.');
            return;
        }
    
        // Get the customer ID from user meta
        $customer_id_meta = get_user_meta(get_current_user_id(), 'customerId', true);
        if (!$customer_id_meta) {
            wp_send_json_error('Customer ID not found.');
            return;
        }
    
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $perPage = isset($_POST['per_page']) ? intval($_POST['per_page']) : 10;
        $offset = ($page - 1) * $perPage;
    
        global $wpdb;
        $transactionTable = $wpdb->prefix . 'tnc_dutchie_transaction';
        $productTable = $wpdb->prefix . 'tnc_dutchie_product';
    
        // Fetch transactions
        $transactions = $wpdb->get_results($wpdb->prepare(
            "SELECT * FROM `$transactionTable` WHERE customerId = %d ORDER BY transactionDate DESC LIMIT %d, %d",
            $customer_id_meta, $offset, $perPage
        ), ARRAY_A);
    
        foreach ($transactions as $key => &$transaction) {
            // Decode the items JSON to access the productIds
            $items = json_decode($transaction['items'], true);
            foreach ($items as &$item) {
                $productId = $item['productId'];
                // Fetch the product name for each productId
                $productName = $wpdb->get_var($wpdb->prepare(
                    "SELECT productName FROM `$productTable` WHERE productId = %d",
                    $productId
                ));
                // Append the productName directly to the item array
                $item['productName'] = $productName;
            }
            // Re-encode the items with product names included back into the transaction
            $transaction['items'] = json_encode($items);
        }
    
        $total_transactions = $wpdb->get_var($wpdb->prepare(
            "SELECT COUNT(*) FROM `$transactionTable` WHERE customerId = %d",
            $customer_id_meta
        ));
        $total_pages = ceil($total_transactions / $perPage);
    
        $response = array(
            'data' => $transactions,
            'total_pages' => $total_pages
        );
    
        wp_send_json_success($response);
    }
    

    public function renderTable()
    {
        // Check if the user is logged in
        if (is_user_logged_in()) {
            // Output the container for the transactions
            echo '<section class="mt-5 mb-5 container">';
            echo '<div class="content-center">';
            echo '<div class="wrap">';
            echo '<h2>Transaction List</h2>';
            echo '<div class="row" style="display: flex; align-items: center; justify-content: space-between;">'; // Add a row with flex display
            // echo '<div class="col-md-6">';
            // echo '<input class="form-control" type="text" id="transaction-search" placeholder="Search Transaction">';
            // echo '</div>';
            echo '<div class="col-md-6">'; // Half width column for the select dropdown
            echo '<select class="btn btn-primary btn-round dropdown-toggle" id="results-per-page">';
            echo '<option value="10">10</option>';
            echo '<option value="50">50</option>';
            echo '<option value="100">100</option>';
            echo '<option value="200">200</option>';
            echo '</select>';
            echo '</div>';
            echo '</div>'; // Close the row
            echo '<div id="transaction-table-container"></div>';
            echo '</div>';
            echo '</section>';

        }
    }
}