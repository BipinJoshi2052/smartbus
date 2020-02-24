<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=auctad5_gsc',
            'username' => 'auctad5_web',
            'password' => 'auctad5_web',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'transport' => [
                'class' => 'Swift_MailTransport',
            ],
            'useFileTransport' => false,
        ],
    ],
];
