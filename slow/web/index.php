<?php
/**
 * 小程序接口入口程序,不建议在该文件添加或修改代码
 * slow.seed.com
 * @author Gene <https://github.com/Talkyunyun>
 */


require_once __DIR__ . '/../../common/config/bootstrap.php';
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';
$config = require_once __DIR__ . '/../config/config.php';

appAlias();
(new \yii\web\Application($config))->run();