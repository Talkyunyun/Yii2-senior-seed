<?php
namespace home\controllers;


/**
 * 首页控制器
 * Class SiteController
 * @package home\controllers
 * @author Gene <https://github.com/Talkyunyun>
 */
class SiteController extends BaseController {

    public function actionIndex() {

        return $this->render('index');
    }
}