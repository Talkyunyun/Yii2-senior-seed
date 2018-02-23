<?php
/**
 * 后台应用配置文件
 * @author Gene <https://github.com/Talkyunyun>
 */

$config = [
    'id'        => 'app-backend',
    'basePath'  => dirname(__DIR__),
    'charset'   => 'utf-8',
    'language'  => 'zh-CN',
    'timeZone'  => 'Asia/Shanghai',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'backend\controllers',

    'params' => array_merge(
        require_once ROOT_PATH . '/common/config/params.php',
        require_once __DIR__ . '/params.php'
    ),

    // 公共组件
    'components' => [
        'request' => [
            'csrfParam' => 'token',
            'cookieValidationKey' => 'sa2g5UDQPsDd3ImHgXwAa3yrFP6OHovOd3gq5RM'
        ],
        'redisCache' => [
            'class' => 'yii\redis\Cache',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass'   => 'backend\models\SysUser',
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
                    'logFile' => '@backend/runtime/logs/run_'.date('Y-m-d').'.log'
                ]
            ]
        ]
    ]
];

// 只有正式环境才会显示友好的错误页面
if (!YII_DEBUG) {
    $config['components']['errorHandler'] = [
        'errorAction' => 'error/show'
    ];
}

return $config;