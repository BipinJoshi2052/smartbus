<?php
$params = array_merge(
        require __DIR__ . '/../../common/config/params.php',
        require __DIR__ . '/../../common/config/params-local.php',
        require __DIR__ . '/../../common/config/params-project.php',
        require __DIR__ . '/params.php',
        require __DIR__ . '/params-local.php'
);

$urlStr = "/primary";
// $baseUrl = str_replace('/backend/web', '', (new Request)->getBaseUrl()) ;
// $baseUrl = (new Request)->getBaseUrl();

return [
        'id'                  => 'app-backend',
        'basePath'            => dirname(__DIR__),
        'controllerNamespace' => 'backend\controllers',
        'bootstrap'           => ['log'],
        'modules'             => [],
        'components'          => [
                'request'    => [
                        'csrfParam' => '_csrf-backend',
                        'class'     => 'common\components\Request',
                        'web'       => '/backend/web',
                        'adminUrl'  => $urlStr,
                        //  'baseUrl'   => $baseUrl,
                ],
                'urlManager' => [
                    //     'baseUrl' => $baseUrl,
                    'rules' => [
                            'users/'                                  => 'users/type/',
                            'users/edit/<id:[a-zA-Z0-9-]+>/'          => 'users/edit/',
                            'users/create/<type:[a-zA-Z0-9-]+>/'      => 'users/create/',
                            'users/type/<type:[a-zA-Z0-9-]+>/'        => 'users/type/',
                            'schedules/view/<id:[a-zA-Z0-9-]+>/'      => 'schedules/view/',
                            'schedules/edit/<id:[a-zA-Z0-9-]+>/'      => 'schedules/edit/',
                            'bookings/edit/<id:[a-zA-Z0-9-]+>/'       => 'bookings/form/',
                            'vehicles/edit/<id:[a-zA-Z0-9-]+>/'       => 'vehicles/edit/',
                            'vehicles/types/edit/<id:[a-zA-Z0-9-]+>/' => 'vehicles/types/',
                            'locations/edit/<id:[a-zA-Z0-9-]+>/'      => 'locations/',
                            'amenities/edit/<id:[a-zA-Z0-9-]+>/'      => 'amenities/',
                            'faq/edit/<id:[a-zA-Z0-9-]+>/'      => 'faq/',


                            'settings/edit/<id:[a-zA-Z0-9-]+>/' => 'settings/',
                            'clients/edit/<id:[a-zA-Z0-9-]+>/'  => 'clients/',


                            'permissions/edit/<id:[a-zA-Z0-9-]+>/'      => 'permissions/',
                            'passengerDetails/edit/<id:[a-zA-Z0-9-]+>/' => 'passengerDetails/',
                            'testimonials/edit/<id:[a-zA-Z0-9-]+>/'     => 'testimonials/',
                            'team/edit/<id:[a-zA-Z0-9-]+>/'             => 'team/',
                            'slider/edit/<id:[a-zA-Z0-9-]+>/'           => 'slider/',
                            'services/edit/<id:[a-zA-Z0-9-]+>/'         => 'services/',
                            [
                                    'pattern'      => 'users/form/<id:[a-zA-Z0-9-]+>',
                                    'route'        => 'users/form/',
                                    'encodeParams' => false,
                            ],
                            [
                                    'pattern'      => 'sections/pages/<page:[a-zA-Z0-9-]+>',
                                    'route'        => 'sections/pages/',
                                    'encodeParams' => false,
                            ],

                            [
                                    'pattern'      => 'sections/section/<id:[a-zA-Z0-9-]+>',
                                    'route'        => 'sections/section',
                                    'encodeParams' => false,
                            ],
                            [
                                    'pattern'      => 'verify/actions/<id:[a-zA-Z0-9-]+>',
                                    'route'        => 'verify/actions/',
                                    'encodeParams' => false,
                            ],
                            'advertisement/edit/<id:[a-zA-Z0-9-]+>/'             => 'advertisement/edit',
                            'blog/edit/<id:[a-zA-Z0-9-]+>/'             => 'blog/edit',
                            'news/edit_cat/<id:[a-zA-Z0-9-]+>/'             => 'news/edit_cat',
                            'news/view/<id:[a-zA-Z0-9-]+>/'             => 'news/view/',
                            'verify/view/<id:[a-zA-Z0-9-]+>/'             => 'verify/view/',
                            'users/add/<type:[a-zA-Z0-9-]+>/'           => 'users/add/',

                    ],
                ],
                'user'       => [
                        'identityClass'   => 'common\models\User',
                        'enableAutoLogin' => false,
                        'identityCookie'  => ['name' => '_identity-backend', 'httpOnly' => true],
                ],
                'session'    => [
                    // this is the name of the session cookie used for login on the backend
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
