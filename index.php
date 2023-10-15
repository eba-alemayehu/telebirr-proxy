<?php
require_once './vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', '1');
$telebirr_decrypted_data = \Eba\TelebirrPhp\Telebirr::decrypt_RSA('');

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