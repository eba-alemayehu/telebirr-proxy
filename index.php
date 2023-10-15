<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once './vendor/autoload.php';


$telebirr_decrypted_data = \Eba\TelebirrPhp\Telebirr::decrypt_RSA('MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAyJD9/Yu+eDRLoieyGM9coIeeaYq6W9oddUCF/MMBTBPdQCpGGqpc0mtUZrjGXu0c1PbTDLLeUlMpghDhArgFERPQiXawtkQ9xhyRi/yFGkd16A/BQNe0fRuXtzggCO1TZ9VE0aF4aqktfmfcbcxAnkqAYQmCIylJkxGHWSVLo5RBAKBPvtzH1oYR7sUNE1Me/rSj/uL8eSdOYkAY217im5LP4ajHNhUM43DqOqQdl3fRqTP7jeWk6dGw+F+nF+vB0VObziZiZc9IkOpKDyVGFW/SMYO1GewLn01u55aSIcOVr6PBWOimmmRBECHegX/f4kd+lBsYeaSdsrPXm5cFhQIDAQAB');

print_r($telebirr_decrypted_data);
$myfile = fopen("log.txt", "w+") or die("Unable to open file!");
fwrite($myfile, $telebirr_decrypted_data);

$client = new \GuzzleHttp\Client();
$response = $client->request('POST', 'https://www.medhhanet.com/telebirr/notifyUrl', [
    'form_params' => [
        'email' => 'test@gmail.com',
        'name' => 'Test user',
        'password' => 'testpassword',
    ]
]);