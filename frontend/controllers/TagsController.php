<?php
/**
 * @Author: cnzhihua
 * @Time: 18-2-25 08:40
 * @Github: https://github.com/Hzhihua
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\BadRequestHttpException;
use frontend\traits\ControllerTrait;
use hzhihua\articles\models\ArticleTag;
use hzhihua\articles\models\ArticleAndTag;

class TagsController extends Controller
{
    use ControllerTrait;

    /**
     * default action
     * @return string
     */
    public function actionIndex()
    {
        $data = [
            'data' => self::getData()->asArray()->all(),
            'tagsData' => self::getAllTags()->asArray()->all(),
        ];

        // get tags by categories_id
        $tag_id = ArrayHelper::getColumn($data['tagsData'], 'id');
        $article_id = self::getArticleIdByTagsId($tag_id);
        $data['article_tags'] = self::getArticleTagsByArticleId($article_id);
        $data['article_categories'] = self::getArticleCategoriesByArticleId($article_id);

        return $this->render('index', $data);
    }

    /**
     * @param $id int tags_id
     * @return string
     * @throws BadRequestHttpException
     */
    public function actionView($id)
    {
        if (! ($_data = self::getData()->where(['id' => $id])->asArray()->one())) {
            throw new BadRequestHttpException(Yii::t('frontend', 'page not found'));
        }

        $data = [
            'data' => $_data,
            'tagsData' => self::getAllTags()->asArray()->all(),
        ];

        $article_id = self::getArticleIdByTagsId($id);
        $data['article_tags'] = self::getArticleTagsByArticleId($article_id);
        $data['article_categories'] = self::getArticleCategoriesByArticleId($article_id);

        return $this->render('view', $data);
    }

    /**
     * @return ActiveRecord|ActiveQuery
     */
    public static function getData()
    {
        return ArticleTag::find()->with('articleAndTag');
    }

    /**
     * @return ActiveRecord|ActiveQuery
     */
    public static function getAllTags()
    {
        return ArticleTag::find()->orderBy(['created_at' => SORT_DESC]);
    }

    /**
     * @param $tag_id int|array
     * @return array|ActiveRecord
     */
    public static function getArticleIdByTagsId($tag_id)
    {
        // get article_id by article_id
        $article_tag = ArticleAndTag::find()
            ->select(['tag_id','article_id'])
            ->where(['tag_id' => $tag_id])
            ->asArray()
            ->all();

        // get unique value of array
        return array_unique(ArrayHelper::getColumn($article_tag, 'article_id'));

    }

}