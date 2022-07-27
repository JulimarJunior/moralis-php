<?php
    namespace Moralis;

    class Request {
        private $header;

        function __construct($token) {
            $this->header = [
                "accept: application/json",
                "X-API-Key: $token"
            ];
        }

        function curl($method, $url, $args) {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($args));
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            $response = curl_exec($ch);

            curl_close($ch);

            return json_decode($response, true);
        }

        function get($url, $args) {
            return $this->curl('GET', $url, $args);
        }
    }