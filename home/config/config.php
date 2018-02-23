<?php
/**
 * 前台应用配置文件
 * @author Gene <https://github.com/Talkyunyun>
 */

$config = [
    'id'        => 'app-home',
    'basePath'  => dirname(__DIR__),
    'charset'   => 'utf-8',
    'language'  => 'zh-CN',
    'timeZone'  => 'Asia/Shanghai',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'home\controllers',

    'params' => array_merge(
        require_once ROOT_PATH . '/common/config/params.php',
        require_once __DIR__ . '/params.php'
    ),

    // 公共组件
    'components' => [
        'request' => [
            'csrfParam' => 'token',
            'cookieValidationKey' => 'SK-DdfKJK2s5fk878DFS87878dDfSdf8'
        ],
        'redisCache' => [
            'class' => 'yii\redis\Cache',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass'   => 'home\models\AdminUser',
            'enableAutoLogin' => true,
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'rules' => require_once __DIR__ . '/routes.php'
        ],
        'db' => (require_once ROOT_PATH . '/common/config/db.php')[YII_ENV],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class'   => 'yii\log\FileTarget',
                    'levels'  => ['error', 'warning', 'trace' ,'info'],
                    'logVars' => [],
                    'logFile' => '@home/runtime/logs/run_'.date('Y-m-d').'.log'
                ]
            ]
        ]
    ]
];


return $config;