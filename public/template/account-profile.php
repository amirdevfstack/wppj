<?php

class AccountProfile
{
    private $wpdb;
    private $table_name;

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table_name = $wpdb->prefix . 'tnc_dutchie_transaction';

        // Register AJAX handlers
        add_action('wp_enqueue_scripts', array($this, 'enqueueUserScripts'));
    }

    public function enqueueUserScripts()
    {
        wp_enqueue_script('jquery'); // Enqueue jQuery if needed
        wp_enqueue_script('trees-n-clouds-transactions', get_template_directory_uri() . '/public/theme/js/transactions.js', array('jquery'), '1.0', true);

        $script_data = array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'action' => 'fetch_customer_transaction'
        );

        wp_localize_script('trees-n-clouds-transactions', 'treesNCloudsAjax', $script_data);
    }

    private function getCurrentUserId()
    {
        return get_user_meta(get_current_user_id(), 'customerId', true);
    }

    // Method to get total number of transactions for the current user
    public function getTotalTransactionCount()
    {
        $userId = $this->getCurrentUserId();
        $sql = "SELECT COUNT(*) AS totalTransactionCount FROM $this->table_name WHERE customerId = $userId";
        return $this->executeQuery($sql);
    }

    // Method to get total revenue for the current user
    public function getTotalRevenue()
    {
        $userId = $this->getCurrentUserId();
        $sql = "SELECT SUM(total) AS totalRevenue FROM $this->table_name WHERE customerId = $userId";
        return $this->executeQuery($sql);
    }

    // Method to get average transaction value for the current user
    public function getAverageTransactionValue()
    {
        $userId = $this->getCurrentUserId();
        $sql = "SELECT AVG(total) AS avgTransactionValue FROM $this->table_name WHERE customerId = $userId";
        return $this->executeQuery($sql);
    }

    // Method to get total discounts given for the current user
    public function getTotalDiscountsGiven()
    {
        $userId = $this->getCurrentUserId();
        $sql = "SELECT SUM(totalDiscount) AS totalDiscounts FROM $this->table_name WHERE customerId = $userId";
        return $this->executeQuery($sql);
    }

    // Method to get average discount per transaction for the current user
    public function getAverageDiscountPerTransaction()
    {
        $userId = $this->getCurrentUserId();
        $sql = "SELECT AVG(totalDiscount) AS avgDiscount FROM $this->table_name WHERE customerId = $userId";
        return $this->executeQuery($sql);
    }

    // Method to get total tax collected for the current user
    public function getTotalTaxCollected()
    {
        $userId = $this->getCurrentUserId();
        $sql = "SELECT SUM(tax) AS totalTax FROM $this->table_name WHERE customerId = $userId";
        return $this->executeQuery($sql);
    }

    // Method to get total number of items sold for the current user
    public function getTotalNumberOfItemsSold()
    {
        $userId = $this->getCurrentUserId();
        $sql = "SELECT SUM(totalItems) AS totalItems FROM $this->table_name WHERE customerId = $userId";
        return $this->executeQuery($sql);
    }

    // Method to get average basket size for the current user
    public function getAverageBasketSize()
    {
        $userId = $this->getCurrentUserId();
        $sql = "SELECT AVG(totalItems) AS avgBasketSize FROM $this->table_name WHERE customerId = $userId";
        return $this->executeQuery($sql);
    }

    // Method to get total loyalty points earned for the current user
    public function getTotalLoyaltyPointsEarned()
    {
        $userId = $this->getCurrentUserId();
        $sql = "SELECT SUM(loyaltyEarned) AS loyaltyEarned FROM $this->table_name WHERE customerId = $userId";
        return $this->executeQuery($sql);
    }

    // Method to get total loyalty points spent for the current user
    public function getTotalLoyaltyPointsSpent()
    {
        $userId = $this->getCurrentUserId();
        $sql = "SELECT SUM(loyaltySpent) AS loyaltySpent FROM $this->table_name WHERE customerId = $userId";
        return $this->executeQuery($sql);
    }

    // Method to get customer transaction frequency
    public function getCustomerTransactionFrequency()
    {
        $sql = "SELECT customerId, COUNT(*) AS transactionCount FROM $this->table_name GROUP BY customerId";
        return $this->executeQuery($sql);
    }

    // Method to get the most popular product
    public function getMostPopularProduct()
    {
        $sql = "SELECT productId, COUNT(productId) AS productCount FROM $this->table_name GROUP BY productId ORDER BY productCount DESC LIMIT 1";
        return $this->executeQuery($sql);
    }
    public function getUserPercentileRankByTotalRevenue()
    {
        $userId = $this->getCurrentUserId();
        $sql = "SELECT 
                    100 * SUM(CASE WHEN totalRevenue > userRevenue THEN 1 ELSE 0 END) / COUNT(*) AS percentileRank
                FROM 
                    (SELECT SUM(total) AS totalRevenue FROM $this->table_name GROUP BY customerId) AS allUsers,
                    (SELECT SUM(total) AS userRevenue FROM $this->table_name WHERE customerId = $userId) AS currentUser";
        return $this->executeQuery($sql);
    }

    // Method to get user's percentile rank based on total number of transactions
    public function getUserPercentileRankByTotalTransactions()
    {
        $userId = $this->getCurrentUserId();
        $sql = "SELECT 
                    100 * SUM(CASE WHEN totalTransactions > userTransactions THEN 1 ELSE 0 END) / COUNT(*) AS percentileRank
                FROM 
                    (SELECT COUNT(*) AS totalTransactions FROM $this->table_name GROUP BY customerId) AS allUsers,
                    (SELECT COUNT(*) AS userTransactions FROM $this->table_name WHERE customerId = $userId) AS currentUser";
        return $this->executeQuery($sql);
    }

    // Method to get user's percentile rank based on total discounts received
    public function getUserPercentileRankByTotalDiscounts()
    {
        $userId = $this->getCurrentUserId();
        $sql = "SELECT 
                    100 * SUM(CASE WHEN totalDiscounts > userDiscounts THEN 1 ELSE 0 END) / COUNT(*) AS percentileRank
                FROM 
                    (SELECT SUM(totalDiscount) AS totalDiscounts FROM $this->table_name GROUP BY customerId) AS allUsers,
                    (SELECT SUM(totalDiscount) AS userDiscounts FROM $this->table_name WHERE customerId = $userId) AS currentUser";
        return $this->executeQuery($sql);
    }

    public function getUserPercentileRankByTotalTaxes()
    {
        $userId = $this->getCurrentUserId();
        $sql = "SELECT 
                100 * SUM(CASE WHEN totalTaxes > userTaxes THEN 1 ELSE 0 END) / COUNT(*) AS percentileRank
            FROM 
                (SELECT SUM(tax) AS totalTaxes FROM $this->table_name GROUP BY customerId) AS allUsers,
                (SELECT SUM(tax) AS userTaxes FROM $this->table_name WHERE customerId = $userId) AS currentUser";
        return $this->executeQuery($sql);
    }

    // Utility function to generate Fibonacci numbers up to 100
    private function getFibonacciNumbers()
    {
        $fib = [1, 2];
        while (true) {
            $nextFib = $fib[count($fib) - 1] + $fib[count($fib) - 2];
            if ($nextFib >= 100)
                break;
            $fib[] = $nextFib;
        }
        return $fib;
    }

    // Method to get minimum values for percentiles based on Fibonacci numbers
    public function getPercentileThresholds($metric)
    {
        // Assuming 'total' is the column to sum for 'totalRevenue'
        $aggregateColumn = ($metric == 'totalRevenue') ? 'SUM(total)' : $metric;

        $sql = "SELECT $aggregateColumn AS metricValue FROM $this->table_name GROUP BY customerId ORDER BY metricValue DESC";
        $allValues = $this->wpdb->get_col($sql);
        $percentiles = [1, 2, 3, 5, 8, 13, 21, 34, 55, 89]; // Fibonacci numbers up to 100
        $thresholds = array();

        foreach ($percentiles as $percentile) {
            $index = ceil((count($allValues) * ($percentile / 100)) - 1);
            $index = max($index, 0);
            $thresholds[$percentile . '%'] = $allValues[$index] ?? 'N/A';
        }

        return json_encode($thresholds);
    }

    // Example method to get user's value for a metric
    public function getUserValueForMetric($metric)
    {
        $userId = $this->getCurrentUserId();
        // Assuming 'total' is the column representing the transaction amount
        $columnToSum = ($metric == 'totalRevenue') ? 'total' : $metric;

        $sql = "SELECT SUM($columnToSum) AS userValue FROM $this->table_name WHERE customerId = $userId";
        return $this->executeQuery($sql);
    }

    // Method to get total number of users
    private function getTotalNumberOfUsers()
    {
        $sql = "SELECT COUNT(DISTINCT customerId) FROM $this->table_name";
        return $this->executeQuery($sql);
    }


    // Private method to execute SQL queries
    private function executeQuery($sql)
    {
        $result = $this->wpdb->get_var($sql); // Use get_var to return a single value
        if ($result !== null) {
            return $result;
        } else {
            return 0; // Return a default value like 0 in case of no result or error
        }
    }

    // Method to render the tables
    public function renderPercentileTables($metric, $displayValue)
    {
        $percentileThresholds = json_decode($this->getPercentileThresholds($metric), true);
        $userValue = $this->getUserValueForMetric($metric);

        echo '
        <div class="col-md-4 ml-auto mr-auto">
            <div class="card card-green" data-background-color="black">
                <div class="card-body content-danger">
                    <h6 class="category-social">
                        <i class="fa fa-apple"></i> Percentile
                    </h6>
                    ';

        // Table 1: Percentiles
        echo '<table class="table table" border="0">';
        foreach ($percentileThresholds as $percentile => $threshold) {
            echo "<tr><td>" . $percentile . "</td></tr>";
        }
        echo '</table>';

        echo '</table>';
        echo '   </div>
            </div>
        </div>
        ';

        echo '
        <div class="col-md-4 ml-auto mr-auto">
            <div class="card card-green" data-background-color="black">
                <div class="card-body content-danger">
                    <h6 class="category-social">
                        <i class="fa fa-apple"></i> Number to Reach
                    </h6>
                    ';

        // Table 2: Number to reach percentile
        echo '<table class="table table" border="0">';
        foreach ($percentileThresholds as $threshold) {
            echo "<tr><td>$" . number_format($threshold, 2) . "</td></tr>";
        }
        echo '</table>';

        echo '</table>';
        echo '   </div>
            </div>
        </div>
        ';

        echo '
        <div class="col-md-4 ml-auto mr-auto">
            <div class="card card-green" data-background-color="black">
                <div class="card-body content-danger">
                    <h6 class="category-social">
                        <i class="fa fa-apple"></i> Status
                    </h6>
                    ';

        // Table 3: User's status
        echo '<table class="table table" border="0">';
        foreach ($percentileThresholds as $threshold) {
            if ($userValue >= $threshold) {
                echo '<tr><td><i class="fa fa-check text-success" aria-hidden="true"></i></td></tr>'; // User has hit the mark
            } else {
                $difference = $threshold - $userValue;
                echo "<tr><td>$" . number_format($difference, 2) . " needed</td></tr>"; // User hasn't hit the mark
            }
        }
        echo '</table>';
        echo '   </div>
            </div>
        </div>
        ';
    }

    public function renderMobilePercentileTables($metric, $displayValue)
    {
        $percentileThresholds = json_decode($this->getPercentileThresholds($metric), true);
        $userValue = $this->getUserValueForMetric($metric);

        echo '
        <div class="col-md-4 ml-auto mr-auto">
            <div class="card card-green" data-background-color="black">
                <div class="card-body content-danger">
                    <h6 class="category-social">
                        <i class="fa fa-apple"></i> Percentile
                    </h6>
                    ';

        // Table 1: Percentiles
        echo '<table class="table table" border="0">';
        foreach ($percentileThresholds as $percentile => $threshold) {
            echo "<td>Rankings</td>";
            echo "<td>$" . number_format($threshold, 2) . "</td>";
            if ($userValue >= $threshold) {
                echo '<td><i class="fa fa-check text-success" aria-hidden="true"></i></td></tr>'; // User has hit the mark
            } else {
                $difference = $threshold - $userValue;
                echo "<td>$" . number_format($difference, 2) . " needed</td></tr>"; // User hasn't hit the mark
            }
        }
        echo '</table>';
        echo '</table>';
        echo '   </div>
            </div>
        </div>
        ';
    }

    function formatPercentileRank($percentileRank)
    {
        if ($percentileRank < 1) {
            return "> 1%";
        } else {
            return number_format($percentileRank, 2) . "%";
        }
    }

    public function renderProfile()
    {
        $current_user = wp_get_current_user();

        // Check if the user is logged in
        if (is_user_logged_in()) {
            ?>
            <div class="page-header header-filter dd-none d-md-block">
                <div class="page-header-image" data-parallax="true"
                    style="background-image: url('<?php echo get_template_directory_uri(); ?>/public/theme/images/min/colors-min.jpg');">
                </div>
                <div class="content-center">
                    <div class="photo-container">
                        <?php
                        $user_id = get_current_user_id();
                        if ($user_id) {
                            $avatar_url = get_avatar_url($user_id);
                            echo '<img class="img rounded" src="' . esc_url($avatar_url) . '" alt="User Avatar">';
                        }
                        ?>
                    </div>
                    <h3 class="title">
                        <?php
                        echo esc_html(wp_get_current_user()->user_firstname);
                        echo ' ';
                        echo esc_html(wp_get_current_user()->user_lastname);
                        ?>
                    </h3>
                    <h5 class="text-white">
                        #
                        <?php echo get_user_meta(get_current_user_id(), 'customerId', true); ?>
                    </h5>
                    <div class="grid-container">
                        <div class="grid-row">
                            <div class="grid-item">
                                <h1><?php echo $this->getTotalTransactionCount() ?></h1>
                                <h3><?php echo $this->formatPercentileRank($this->getUserPercentileRankByTotalTransactions()) ?></h3>
                                <p>Visits</p>
                            </div>
                            <div class="grid-item">
                                <h1><?php echo number_format($this->getTotalDiscountsGiven() / 1, 2); ?></h1>
                                <h3><?php echo $this->formatPercentileRank($this->getUserPercentileRankByTotalDiscounts()) ?></h3>
                                <p>Discounts</p>
                            </div>
                        </div>
                        <div class="grid-row">
                            <div class="grid-item">
                                <h1><?php echo number_format($this->getTotalRevenue() / 1, 2); ?></h1>
                                <h3><?php echo $this->formatPercentileRank($this->getUserPercentileRankByTotalRevenue()) ?></h3>
                                <p>Revenue</p>
                            </div>
                            <div class="grid-item">
                                <h1><?php echo number_format($this->getTotalTaxCollected() / 1, 2); ?></h1>
                                <h3><?php echo $this->formatPercentileRank($this->getUserPercentileRankByTotalTaxes()) ?></h3>
                                <p>Taxes</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-center d-md-none" style="padding-top: 75px;">
                    <div class="photo-container text-center">
                        <?php
                        $user_id = get_current_user_id();
                        if ($user_id) {
                            $avatar_url = get_avatar_url($user_id);
                            echo '<img class="img rounded" src="' . esc_url($avatar_url) . '" alt="User Avatar">';
                        }
                        ?>
                    </div>
                    <h5 class="title text-center">
                        <?php
                        echo esc_html(wp_get_current_user()->user_firstname);
                        echo ' ';
                        echo esc_html(wp_get_current_user()->user_lastname);
                        ?>
                    </h5>
                    <h5 class="text-center">
                        #
                        <?php echo get_user_meta(get_current_user_id(), 'customerId', true); ?>
                    </h5>
                    <div class="grid-container">
                        <div class="grid-item">
                            <h3>
                                <?php echo $this->getTotalTransactionCount() ?>
                            </h1>
                            <h3>
                                <?php echo $this->formatPercentileRank($this->getUserPercentileRankByTotalTransactions()) ?>
                            </h3>
                            <p>Visits</p>
                        </div>
                        <div class="grid-item">
                            <h3>$
                                <?php echo number_format($this->getTotalDiscountsGiven() / 1, 2); ?>
                            </h3>
                            <h3>
                                <?php echo $this->formatPercentileRank($this->getUserPercentileRankByTotalDiscounts()) ?>
                            </h3>
                            <p>Discounts</p>
                        </div>
                        <div class="grid-item">
                            <h3>$
                                <?php echo number_format($this->getTotalRevenue() / 1, 2); ?>
                            </h3>
                            <h3>
                                <?php echo $this->formatPercentileRank($this->getUserPercentileRankByTotalRevenue()) ?>
                            </h3>
                            <p>Revenue</p>
                        </div>
                        <div class="grid-item">
                            <h3>$
                                <?php echo number_format($this->getTotalTaxCollected() / 1, 2); ?>
                            </h3>
                            <h3>
                                <?php echo $this->formatPercentileRank($this->getUserPercentileRankByTotalTaxes()) ?>
                            </h3>
                            <p>Taxes</p>
                        </div>
                    </div>

                </div>

            <div style="padding-top: 100px" class="row d-none d-md-block">
                <div class="container">
                    <div class="col-md-12">
                        <div class="nav-align-center mb-5">
                            <ul class="nav nav-pills nav-pills-primary nav-pills-just-icons" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#revenue" role="tablist">
                                        <i class="now-ui-icons business_bank"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#discounts" role="tablist">
                                        <i class="now-ui-icons objects_diamond"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tax" role="tablist">
                                        <i class="now-ui-icons sport_trophy"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content gallery">
                            <div class="tab-pane active" id="revenue" role="tabpanel">
                                <div class="text-center">
                                    <h3 class="">Top Revenue</h3>
                                </div>
                                <div class="row">
                                    <?php $this->renderPercentileTables('totalRevenue', 'Total Revenue'); ?>
                                </div>
                            </div>
                            <div class="tab-pane" id="discounts" role="tabpanel">
                                <div class="text-center">
                                    <h3 class="">Top Discount</h3>
                                </div>
                                <div class="row">
                                    <?php $this->renderPercentileTables('totalDiscount', 'Total Discounts'); ?>
                                </div>
                            </div>
                            <div class="tab-pane" id="tax" role="tabpanel">
                                <div class="text-center">
                                    <h3 class="">Top Tax</h3>
                                </div>
                                <div class="row">
                                    <?php $this->renderPercentileTables('tax', 'Total Tax'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="padding-top: 100px" class="row d-md-none">
                <div class="container">
                    <div class="col-md-12">
                        <div class="tab-content gallery">
                            <div class="tab-pane active" id="revenue" role="tabpanel">
                                <div class="text-center">
                                    <h3 class="">Top Revenue</h3>
                                </div>
                                <div class="row">
                                    <?php $this->renderMobilePercentileTables('totalRevenue', 'Total Revenue'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}