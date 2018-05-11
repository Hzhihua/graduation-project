<?php
/**
 * @Author: cnzhihua
 * @Time: 18-2-25 08:39
 * @Github: https://github.com/Hzhihua
 */

namespace frontend\controllers;

use yii\web\Controller;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use frontend\models\Article;
use frontend\traits\ControllerTrait;

class ArchivesController extends Controller
{
    use ControllerTrait;

    /**
     * default action
     * @return string
     */
    public function actionIndex()
    {
        $articleData = self::getData()->orderBy(['created_at' => SORT_DESC, 'id' => SORT_DESC])->asArray()->all();
        $article_id = ArrayHelper::getColumn($articleData, 'id');

        $data = [
            'data' => $articleData,
            'article_tags' => self::getArticleTagsByArticleId($article_id),
            'article_categories' => self::getArticleCategoriesByArticleId($article_id),
        ];

        return $this->render('index', $data);
    }

    /**
     * @return ActiveRecord|ActiveQuery
     */
    public static function getData()
    {
        return Article::find()
            ->select(['id', 'title', 'description', 'public_time'])
            ->where(['<=', 'public_time', time()])
            ->orderBy(['public_time' => SORT_DESC, 'id' => SORT_DESC]);
    }

}