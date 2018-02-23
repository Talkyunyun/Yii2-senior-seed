<?php
/**
 * Mysql数据库配置
 * @author Gene <https://github.com/Talkyunyun>
 */

return [
    ENV_DEV => [
        'class'         => 'yii\db\Connection',
        'charset'       => 'utf8',
        'dsn'           => 'mysql:host=127.0.0.1:3306;dbname=seed_project',
        'username'      => 'root',
        'password'      => 'root',
        'tablePrefix'   => 'g_'
    ],
    ENV_PRD => [
        'class'         => 'yii\db\Connection',
        'charset'       => 'utf8',
        'dsn'           => 'mysql:host=127.0.0.1:3306;dbname=seed_project',
        'username'      => 'root',
        'password'      => 'root',
        'tablePrefix'   => 'g_',

        // 开启schema缓存
        'enableSchemaCache' => true,
        'schemaCacheDuration' => 3600,
        'schemaCache' => 'cache'
    ]
];