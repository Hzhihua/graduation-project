<?php
/**
 * @Author: Hzhihua
 * @Time: 2018/1/27 18:37
 * @Github: https://github.com/Hzhihua
 */

namespace backend\behaviours;

use yii\base\ActionFilter;
use yii\filters\VerbFilter;

class Controller extends ActionFilter
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
}