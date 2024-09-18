<?php

class AdminComponents
{
    public $geo;
    private $mapsApiKey;
    public function __construct($mapsApiKey)
    {
        $this->mapsApiKey = $mapsApiKey;

        require_once plugin_dir_path( __FILE__ ) . 'component-geolocation.php';
    }

    public function geolocation($location) 
    {
         $this->geo = new GeolocationComponent($this->mapsApiKey);
         return $this->geo->getCoordinates($location);
    }
}