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
use hzhihua\articles\models\ArticleAndTag;
use hzhihua\articles\models\ArticleTag;

class TagsController extends Controller
{
    /**
     * default action
     * @return string
     */
    public function actionIndex()
    {
        $data = [
            'data' => $this->getData()->asArray()->all(),
            'tagsData' => $this->getAllTags()->asArray()->all(),
        ];

        // get tags by categories_id
        $tag_id = ArrayHelper::getColumn($data['tagsData'], 'id');
        $data['article_tags'] = self::getArticleTagsByTagsId($tag_id);

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
            'tagsData' => $this->getAllTags()->asArray()->all(),
        ];

        $data['article_tags'] = self::getArticleTagsByTagsId($id);

        return $this->render('view', $data);
    }

    public function getData($where = [])
    {
        return ArticleTag::find()->where($where)->with('articleAndTag');
    }

    public function getAllTags()
    {
        return ArticleTag::find()->orderBy(['created_at' => SORT_DESC]);
    }

    /**
     * @param $tag_id
     * @return array|ActiveRecord[]
     */
    public static function getArticleTagsByTagsId($tag_id)
    {
        // get article_id by article_id
        $article_tag = ArticleAndTag::find()
            ->select(['tag_id','article_id'])
            ->where(['tag_id' => $tag_id])
            ->asArray()
            ->all();

        // get unique value of array
        $article_id = array_unique(ArrayHelper::getColumn($article_tag, 'article_id'));

        // get tags by article_id
        return ArticleAndTag::find()
            ->select(['article_id', 'tag_id'])
            ->with([
                'articleTag' => function (ActiveQuery $query) {
                    $query->select('id,name');
                }
            ])
            ->where(['article_id' => $article_id])
            ->orderBy(['tag_id' => SORT_DESC])
            ->asArray()
            ->all();
    }

}