<?php
/**
 * 小程序接口项目配置文件
 * @author Gene <https://github.com/Talkyunyun>
 */

$config = [
    'id'        => 'app-slow-api',
    'basePath'  => dirname(__DIR__),
    'charset'   => 'utf-8',
    'language'  => 'zh-CN',
    'timeZone'  => 'Asia/Shanghai',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'slow\controllers',

    'params' => array_merge(
        require_once ROOT_PATH . '/common/config/params.php',
        require_once __DIR__ . '/params.php'
    ),

    // 公共组件
    'components' => [
        'request' => [
            'csrfParam' => 'token',
            'cookieValidationKey' => '37db8804c94bae1d0e198c754022e9a2552cc6fa'
        ],
        'redisCache' => [
            'class' => 'yii\redis\Cache',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass'   => 'slow\models\Clients',
            'enableAutoLogin' => false,
            'enableSession'   => false,
            'loginUrl'        => null
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'rules' => require_once __DIR__ . '/routes.php'
        ],
        'redis' => (require_once ROOT_PATH . '/common/config/redis.php')[YII_ENV],
        'db' => (require_once ROOT_PATH . '/common/config/db.php')[YII_ENV],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class'   => 'yii\log\FileTarget',
                    'levels'  => ['error', 'warning', 'trace' ,'info'],
                    'logVars' => [],
                    'logFile' => '@slow/runtime/logs/run_'.date('Y-m-d').'.log'
                ]
            ]
        ]
    ]
];

return $config;