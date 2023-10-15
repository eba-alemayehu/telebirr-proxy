<?php

$telebirr_decrypted_data = \telebirr\Telebirr::decrypt_RSA(
    'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAyJD9/Yu+eDRLoieyGM9coIeeaYq6W9oddUCF/MMBTBPdQCpGGqpc0mtUZrjGXu0c1PbTDLLeUlMpghDhArgFERPQiXawtkQ9xhyRi/yFGkd16A/BQNe0fRuXtzggCO1TZ9VE0aF4aqktfmfcbcxAnkqAYQmCIylJkxGHWSVLo5RBAKBPvtzH1oYR7sUNE1Me/rSj/uL8eSdOYkAY217im5LP4ajHNhUM43DqOqQdl3fRqTP7jeWk6dGw+F+nF+vB0VObziZiZc9IkOpKDyVGFW/SMYO1GewLn01u55aSIcOVr6PBWOimmmRBECHegX/f4kd+lBsYeaSdsrPXm5cFhQIDAQAB',
);

print_r($telebirr_decrypted_data);

$client = new \GuzzleHttp\Client();
$client->post(
    'https://www.medhhanet.com/telebirr/notifyUrl',
    array(
        'body' => array(
            'email' => 'test@gmail.com',
            'name' => 'Test user',
            'password' => 'testpassword'
        )
    )
);