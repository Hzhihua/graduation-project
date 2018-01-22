<?php
/**
 * @Author: cnzhihua
 * @Time: 18-1-21 10:07
 * @Github: https://github.com/Hzhihua
 */

namespace frontend\controllers;


use yii\web\Controller;

class IndexController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}