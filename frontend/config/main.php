<?php
$params = array_merge(
        require __DIR__ . '/../../common/config/params.php',
        require __DIR__ . '/../../common/config/params-local.php',
        require __DIR__ . '/../../common/config/params-project.php',
        require __DIR__ . '/params.php',
        require __DIR__ . '/params-local.php'
);

use yii\web\Request;

$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());

return [
        'id'                  => 'app-frontend',
        'basePath'            => dirname(__DIR__),
        'bootstrap'           => ['log'],
        'controllerNamespace' => 'frontend\controllers',
        'components'          => [
                'authClientCollection' => [
                        'class'   => 'yii\authclient\Collection',
                        'clients' => [
                                'google'   => [
                                        'class'        => 'yii\authclient\clients\Google',
                                        'clientId'     => '327064425708-kagg0nu7nnd5onve7tdf2rreqnc5q8b4.apps.googleusercontent.com',
                                        'clientSecret' => 'EoIrK4UJKvr5H8LA-_lqezZR',
                                ],
                                'facebook' => [
                                        'class'          => 'yii\authclient\clients\Facebook',
//                                                                                'authUrl'        => 'https://www.facebook.com/dialog/oauth?display=popup',
                                        'clientId'       => '697105547494171',
                                        'clientSecret'   => 'b95ea26a5d422b6a61d6b703ee4d8bf9',
                                        'attributeNames' => [
                                                'name',
                                                'email',
                                                'first_name',
                                                'last_name',
                                                'age_range',
                                                'link',
                                                'gender',
                                                'locale',
                                                'picture',
                                        ],
                                ],

                        ],
                ],
                'request'              => [
                        'csrfParam' => '_csrf-frontend',
                        //                'baseUrl'   => $baseUrl,
                        'class'     => 'common\components\Request',
                        'web'       => '/frontend/web',
                ],

                'urlManager'   => [
                    //                'baseUrl' => $baseUrl,
                    'rules' => [
                            'post/index/<type:[a-zA-Z0-9-]+>/' => 'post/index/',
                            'post/view/<id:[a-zA-Z0-9-]+>'     => 'post/one/',
                            'blog/view/<id:[a-zA-Z0-9-]+>'     => 'blog/view/',
                            'blog/view/<id:[a-zA-Z0-9-]+>/update'=>'blog/update',
                           // 'search/'     => 'pos/index'

                            // Search Page
                    ],


                ],
                'user'         => [
                        'identityClass'   => 'common\models\User',
                        'enableAutoLogin' => true,
                        'identityCookie'  => ['name' => '_identity-frontend', 'httpOnly' => true],
                ],
                'session'      => [
                    // this is the name of the session cookie used for login on the frontend
                    'name' => '_web_session',
                ],
                'log'          => [
                        'traceLevel' => YII_DEBUG ? 3 : 0,
                        'targets'    => [
                                [
                                        'class'  => 'yii\log\FileTarget',
                                        'levels' => ['error', 'warning'],
                                ],
                        ],
                ],
                'errorHandler' => [
                        'errorAction' => 'site/error',
                ],
                'assetManager' => [
                        'bundles' => [
                                'yii\web\YiiAsset'                   => [
                                        'js' => [],
                                ],
                                'yii\web\JqueryAsset'                => [
                                        'js' => [],
                                ],
                                'yii\bootstrap\BootstrapPluginAsset' => [
                                        'js' => [],
                                ],
                                'yii\bootstrap\BootstrapAsset'       => [
                                        'css' => [],
                                ],

                        ],
                ],

        ],
        'params'              => $params,
];
