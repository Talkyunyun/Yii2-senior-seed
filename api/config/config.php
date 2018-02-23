<?php
/**
 * API项目总配置文件
 * @author Gene <https://github.com/Talkyunyun>
 */

$config = [
    'id'            => 'api-app',
    'basePath'      => dirname(__DIR__),
    'charset'       => 'utf-8',
    'language'      => 'zh-CN',
    'timeZone'      => 'Asia/Shanghai',
    'bootstrap'     => ['log'],

    // 版本模块列表
    'modules' => [
        'v1' => [
            'class' => 'api\modules\v1\Module'
        ]
    ],

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
            'identityClass'   => 'common\models\Clients',
            'enableAutoLogin' => false,
            'enableSession'   => false,
            'loginUrl'        => null
        ],
        'urlManager' => [
            'enablePrettyUrl'     => true,
            'enableStrictParsing' => true,
            'showScriptName'      => false,
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
                    'logFile' => '@api/runtime/logs/run_'.date('Y-m-d').'.log'
                ]
            ]
        ]
    ]
];


return $config;