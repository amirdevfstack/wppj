<?php

class GeolocationComponent {
    private $apiKey;

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }

    public function getCoordinates($address) {
        $address = urlencode($address);
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key={$this->apiKey}";

        // Initialize CURL:
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Get the JSON response:
        $json = curl_exec($ch);
        curl_close($ch);

        // Decode the JSON response:
        $response = json_decode($json, true);

        // error_log('GET GEO RESPONSE: ' . var_dump($response, false));

        // Check if the response is ok:
        if ($response['status'] == 'OK') {
            $latitude = $response['results'][0]['geometry']['location']['lat'];
            $longitude = $response['results'][0]['geometry']['location']['lng'];
           
            // Return the coordinates as a JSON object:
            return json_encode(array('latitude' => $latitude, 'longitude' => $longitude));
        } else {
            // Handle error or no results found
            return json_encode(array('error' => 'No results found for the specified address.'));
        }
    }
}

?>