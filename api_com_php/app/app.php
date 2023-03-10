<?php

define("API_BASE", "http://localhost/api/?option=");

echo API_BASE . "status";

function api_request($option){

    $client = curl_init(API_BASE . $option);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
}