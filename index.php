<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once './vendor/autoload.php';
$myfile = fopen("log.txt", "a+") or die("Unable to open file!");
$data = 'dhIc4KR1G43AzNagFatCBcYyFoyEBCPbdbjT8yb6WZwH2mzxX7TZhSigO6m91r8n5dnbh3ogTVPDdDMrZ4C1CxFNrnH3Fkru5Cq/aslUpaOpbydBvGpcBVxlnGmqzaQL9mjWUgfXVRqfvjmcHiTymEFCX081G5q850db69am3/i37v9jRhBdGn0PeRBWo7qRoMn/SVA+DyRECXBBASJYi2RhNEZaitRVqCfcpFtpY9QRKNq+4FdKG/9ZxhotwO/bYsDOojMMrsq9xS5NjqvMeh1JbO9Xe/0wGQHiSKMQe94cjgXr0r/9MjvqBzReSIWbBgbqvh9WuLixSd3cbdPCex/8zGu8E2WIh2A20jeFqGNIf47YoKPk4RDR6Ftn4iecSlif8SqxqMVu0UoMym3AO0Lg2TinQPoKyYQPZazXmHrwcof2AwET8PTRfqTQQkFPfSvG3zQTWGIXnD1o5HscmuHj6WTj9gi6WZ0sU523S9hBkOr5SWd9btayJ+yF3ULUUr0QxSQFllQ2DHWsxef2LeBVYYRNmpnVijgHaORP2iZTjy13dgpBg1KrbbKP7KvFOv4VrmAZ1y9W9jFwJN7dDe6Ig39rNt6+6liD1SqIhk6VMYdxccuvKYg6rHJtV3eX7J+5PD0EHWLdMhpCDkhrmPWMEa9ZmhKeBOuuAy2CO9o=';
fwrite($myfile, $data);
$telebirr_decrypted_data = \Eba\TelebirrPhp\Telebirr::decrypt_RSA('MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAyJD9/Yu+eDRLoieyGM9coIeeaYq6W9oddUCF/MMBTBPdQCpGGqpc0mtUZrjGXu0c1PbTDLLeUlMpghDhArgFERPQiXawtkQ9xhyRi/yFGkd16A/BQNe0fRuXtzggCO1TZ9VE0aF4aqktfmfcbcxAnkqAYQmCIylJkxGHWSVLo5RBAKBPvtzH1oYR7sUNE1Me/rSj/uL8eSdOYkAY217im5LP4ajHNhUM43DqOqQdl3fRqTP7jeWk6dGw+F+nF+vB0VObziZiZc9IkOpKDyVGFW/SMYO1GewLn01u55aSIcOVr6PBWOimmmRBECHegX/f4kd+lBsYeaSdsrPXm5cFhQIDAQAB', $data);

print_r($telebirr_decrypted_data);
fwrite($myfile, $telebirr_decrypted_data);


$client = new \GuzzleHttp\Client();
$response = $client->request('POST', 'https://www.medhhanet.com/telebirr/notifyUrl', [
    'form_params' => json_decode($telebirr_decrypted_data)
]);