<?php
return [
        'components' => [
            /*'db'     => [
                    'class'    => 'yii\db\Connection',
                    'dsn'      => 'mysql:host=localhost;dbname=smartbuscom_db',
                    'username' => 'smartbuscom_user',
                    'password' => 'smartbuscom_user',
                    'charset'  => 'utf8',
            ],*/
            'db'     => [
                    'class'    => 'yii\db\Connection',
                    'dsn'      => 'mysql:host=localhost;dbname=smartbus',
                    'username' => 'root',
                    'password' => '',
                    'charset'  => 'utf8',
            ],
           'mailer' => [
                    'class'            => 'yii\swiftmailer\Mailer',
                    'viewPath'         => '@common/mail',
                    'transport'        => [
                            'class' => 'Swift_MailTransport',
                            'host' => 'mail.auctadigital.com',  // e.g. smtp.mandrillapp.com or smtp.gmail.com
                            'username' => 'info@auctadigital.com',
                            'password' => '12HelloGoogle34',
                            'port' => '587', // Port 25 is a very common port too
                            'encryption' => 'tls', // It is often used, check your provider or mail server specs
                    ],
                    'useFileTransport' => false,
            ],
        ],
];
