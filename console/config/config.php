<?php
/**
 * 命令模块配置文件
 * @author Gene <https://github.com/Talkyunyun>
 */

$config = [
    'id'        => 'app-console',
    'basePath'  => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language'  => 'zh-CN',
    'charset'   => 'UTF-8',
    'timeZone'  => 'Asia/Shanghai',
    'controllerNamespace' => 'console\controllers',

    'params' => array_merge(
        require_once ROOT_PATH . '/common/config/params.php',
        require_once __DIR__ . '/params.php'
    ),

    // 公共组件
    'components' => [
        'db' => (require_once ROOT_PATH . '/common/config/db.php')[YII_ENV],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class'   => 'yii\log\FileTarget',
                    'levels'  => ['error', 'warning', 'trace' ,'info'],
                    'logVars' => [],
                    'logFile' => '@console/runtime/run_'.date('Y-m-d').'.log'
                ]
            ]
        ]
    ]
];

return $config;