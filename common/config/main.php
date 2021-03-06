<?php
return [
        'name'     => 'Smart Bus',
        'timeZone' => 'Asia/Kathmandu',
        'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',

        'aliases'    => [
                '@bower' => '@vendor/bower-asset',
                '@npm'   => '@vendor/npm-asset',
        ],
        'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
        'components' => [
                'urlManager' => [
                        'class'           => 'yii\web\UrlManager',

                        // Disable index.php
                        'showScriptName'  => false,
                        // Disable r= routes
                        'enablePrettyUrl' => true,
                        'rules'           => [
                            //url pattern
                            '<controller:\w+>/<id:\d+>'                         => '<controller>/view',
                            '<controller:\w+>/<action:\w+>/<id:\d+>'            => '<controller>/<action>',
                            '<controller:\w+>/<action:\w+>'                     => '<controller>/<action>',

                            'site/partner/<id:[a-zA-Z0-9-]+>/'      => 'site/partner/',
                            'dashboard/<id:[a-zA-Z0-9-]+>/'      => 'dashboard/',
                            'site/careers/<id:[a-zA-Z0-9-]+>/'      => 'site/careers',
//                            'site/message/' => 'site/message/',
                            'clients/post/<id:[a-zA-Z0-9-]+>/'      => 'clients/post',
                            'explore/edit/<id:[a-zA-Z0-9-]+>/'      => 'explore/',
                            'destination/index/<id:[a-zA-Z0-9-]+>/'      => 'destination/index',
                            'register/validate/<id:[a-zA-Z0-9-_]+>/'      => 'register/validate/',
                            'site/reset-final/<id:[a-zA-Z0-9-_-]+>/'      => 'site/reset-final',
                            //terms
                            'terms/post/<id:[a-zA-Z0-9-]+>/'      => 'terms/post',
                            'terms/edit/<id:[a-zA-Z0-9-]+>/'      => 'terms/edit',
                            'terms/view/<id:[a-zA-Z0-9-]+>/'      => 'terms/view',
                            //Privacy
                            'privacy/post/<id:[a-zA-Z0-9-]+>/'      => 'privacy/post',
                            'privacy/edit/<id:[a-zA-Z0-9-]+>/'      => 'privacy/edit',
                            'privacy/view/<id:[a-zA-Z0-9-]+>/'      => 'privacy/view',


                            //Vacancy
                            'careers/post/<id:[a-zA-Z0-9-]+>/'      => 'careers/post',


                            //News
                            'news/post/<id:[a-zA-Z0-9-]+>/' => 'news/post',
                            'news/edit-category/<id:[a-zA-Z0-9-]+>/' => 'news/edit-category',
                            //Blog
                            'blog/index?page=<id:[a-zA-Z0-9-]+>&per-page=3/' => 'blog/',
                            'verify/view-action/<id:[a-zA-Z0-9-]+>/' => 'verify/view-action',
                            'blog/edit-category/<id:[a-zA-Z0-9-]+>/' => 'blog/edit-category',
                            'verify/view-comment/<id:[a-zA-Z0-9-]+>/' => 'verify/view-comment',
                            'view-blogs/blog/<id:[a-zA-Z0-9-]+>/' => 'view-blogs/blog',
                            'blog/view/<id:[a-zA-Z0-9-]+>/' => 'blog/view',
                            'blog/post/<id:[a-zA-Z0-9-]+>/' => 'blog/post',
                            //advertisement
                            'advertisement/post/<id:[a-zA-Z0-9-au]+>/' => 'advertisement/post',

                            // Rules for API
                            'api/search/search-locations/<term:[a-zA-Z0-9-]+>/' => 'api/search/search-locations/',
                            /* [
                                   'pattern' => 'search/schedules/<from:[a-zA-Z0-9-]+>/<to:[a-zA-Z0-9-]+>/',
                                   'route' => 'post/index',
                                   'defaults' => ['page' => 1, 'tag' => ''],
                             ],*/
                        ],
                ],
                'helper'     => [
                        'class' => 'common\components\Helper',
                ],
                'security'   => [
                        'class' => 'common\components\security\Security',

                        'certificateFile' => '',    // alias or path to default certificate file
                        // or
                        'publicKeyFile'   => '',      // alias or path to default public key file

                        'privateKeyFile' => '',     // alias or path to default private key file
                        'passphrase'     => '',         // passphrase to default private key (if exists)
                ],
                'cache'      => [
                        'class' => 'yii\caching\FileCache',
                ],

                'errorHandler' => [
                        'errorAction' => 'site/error',
                ],
                'request'      => [
                        'enableCsrfValidation' => true
                ],
                'session'      => [
                        'timeout' => 60,
                ],

        ],
        'bootstrap'  => ['common\components\Helper'],
        'modules'    => [
                'api' => [
                        'class' => 'common\modules\api\Api',
                ],
                'accounts' => [
                        'class' => 'common\modules\accounts\Accounts',
                ],
        ],
];
