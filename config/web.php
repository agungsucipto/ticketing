<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
  'id' => 'basic',
  'basePath' => dirname(__DIR__),
  'bootstrap' => ['log'],
  'name' => 'Ticketing Apps',
  'aliases' => [
    '@bower' => '@vendor/bower-asset',
    '@npm'   => '@vendor/npm-asset',
  ],
  'components' => [
    'request' => [
      // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
      'cookieValidationKey' => 'zYmnMVZmnUE3SYuYJeVjCv1wFqc0cH4V',
    ],
    'cache' => [
      'class' => 'yii\caching\FileCache',
    ],
    'user' => [
      'identityClass' => 'app\models\User',
      'enableAutoLogin' => true,
      'loginUrl' => ['site/login'],
    ],
    'authManager' => [
      'class' => 'yii\rbac\DbManager',
    ],
    'errorHandler' => [
      'errorAction' => 'site/error',
    ],
    'jwt' => [
      'class' => \sizeg\jwt\Jwt::class,
      'key'   => 'my_key',
    ],
    'mailer' => [
      'class' => \yii\symfonymailer\Mailer::class,
      'viewPath' => '@app/mail',
      'useFileTransport' => true,
    ],
    'log' => [
      'traceLevel' => YII_DEBUG ? 3 : 0,
      'targets' => [
        [
          'class' => 'yii\log\FileTarget',
          'levels' => ['error', 'warning'],
        ],
      ],
    ],
    'db' => $db,
    'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => false,
        'rules' => [
          ['class' => 'yii\rest\UrlRule', 'controller' => 'v1/auth/login'],
        ],
    ],
  ],
  'modules' => [
    'v1' => [
      'class' => 'app\modules\v1\Module',
    ],
    'admin' => [
        'class' => 'mdm\admin\Module',
    ]
  ],
  'as access' => [
    'class' => 'mdm\admin\components\AccessControl',
    'allowActions' => [
      'v1/*',
      'admin/*',
      'site/login'
    ]
  ],
  'params' => $params,
];

if (YII_ENV_DEV) {
  // configuration adjustments for 'dev' environment
  $config['bootstrap'][] = 'debug';
  $config['modules']['debug'] = [
    'class' => 'yii\debug\Module',
    // uncomment the following to add your IP if you are not connecting from localhost.
    //'allowedIPs' => ['127.0.0.1', '::1'],
  ];

  $config['bootstrap'][] = 'gii';
  $config['modules']['gii'] = [
    'class' => 'yii\gii\Module',
    // uncomment the following to add your IP if you are not connecting from localhost.
    //'allowedIPs' => ['127.0.0.1', '::1'],
  ];
}

return $config;
