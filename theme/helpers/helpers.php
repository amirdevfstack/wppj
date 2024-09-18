<?php

class Helpers
{

    // Function to make an API call
    public static function callAPI($method, $url, $data = false)
    {
        $curl = curl_init();

        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "GET":
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
                break;
            // Add other methods as needed
        }

        // Set the URL and other options
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        // Execute and close the cURL session
        $result = curl_exec($curl);
        curl_close($curl);

        return $result;
    }


    // Function to insert data into the database
    public static function insertData($tableName, $data)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . $tableName;

        foreach ($data as $row) {
            $wpdb->insert($table_name, $row);
        }
    }
}