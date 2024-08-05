<?php

return [
    'driver' => env('MAIL_DRIVER', 'smtp'),
    'host' => env('MAIL_HOST', 'smtp.mail.eu-west-1.awsapps.com'),
    'port' => env('MAIL_PORT', 465),
    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'app@MY_comp.com'),
        'name' => env('MAIL_FROM_NAME', 'MY_comp Administration'),
    ],
    'encryption' => env('MAIL_ENCRYPTION', 'tls'),
    'username' => env('MAIL_USERNAME', 'app@MY_comp.com'),
    'password' => env('MAIL_PASSWORD', 'Chamundi@299'),
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => [
        'theme' => 'default',
        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],
    'log_channel' => env('MAIL_LOG_CHANNEL'),
    'admin_address' => env('MAIL_ADMIN_ADDRESS', 'admin@example.com'),

];
