<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once './vendor/autoload.php';
$myfile = fopen("log.txt", "a+") or die("Unable to open file!");

$telebirr_decrypted_data = \Eba\TelebirrPhp\Telebirr::decrypt_RSA('MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAyJD9/Yu+eDRLoieyGM9coIeeaYq6W9oddUCF/MMBTBPdQCpGGqpc0mtUZrjGXu0c1PbTDLLeUlMpghDhArgFERPQiXawtkQ9xhyRi/yFGkd16A/BQNe0fRuXtzggCO1TZ9VE0aF4aqktfmfcbcxAnkqAYQmCIylJkxGHWSVLo5RBAKBPvtzH1oYR7sUNE1Me/rSj/uL8eSdOYkAY217im5LP4ajHNhUM43DqOqQdl3fRqTP7jeWk6dGw+F+nF+vB0VObziZiZc9IkOpKDyVGFW/SMYO1GewLn01u55aSIcOVr6PBWOimmmRBECHegX/f4kd+lBsYeaSdsrPXm5cFhQIDAQAB');

print_r($telebirr_decrypted_data);
fwrite($myfile, $telebirr_decrypted_data);
fwrite($myfile, $_SERVER['REMOTE_ADDR']);



$client = new \GuzzleHttp\Client();
try {
    $response = $client->post('https://www.medhhanet.com/telebirr/notifyUrl', [
        GuzzleHttp\RequestOptions::JSON => json_decode($telebirr_decrypted_data)
    ]);
    fwrite($myfile, $response);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    fwrite($myfile, $e);
}

