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
use hzhihua\articles\models\ArticleCategory;
use hzhihua\articles\models\ArticleAndCategory;

class CategoriesController extends Controller
{
    /**
     * default action
     * @return string
     */
    public function actionIndex()
    {
        $data = [
            'data' => self::getData()->asArray()->all(),
            'categoriesData' => self::getAllCategories()->asArray()->all(),
        ];

        // get article_tags by categories_id
        $category_id = ArrayHelper::getColumn($data['categoriesData'], 'id');
        $data['article_tags'] = self::getArticleTagsByCategoriesId($category_id);

        return $this->render('index', $data);
    }

    /**
     * @param $id int category_id
     * @return string
     * @throws BadRequestHttpException
     */
    public function actionView($id)
    {
        if (! ($_data = self::getData()->where(['id' => $id])->asArray()->one())) {
            throw new BadRequestHttpException(Yii::t('frontend', 'Page not found'));
        }

        $data = [
            'data' => $_data,
            'categoriesData' => self::getAllCategories()->asArray()->all(),
        ];

        // get article_tags by categories_id
        $data['article_tags'] = self::getArticleTagsByCategoriesId($id);

        return $this->render('view', $data);
    }

    /**
     * @return ActiveRecord|ActiveQuery
     */
    public static function getData()
    {
        return ArticleCategory::find()
            ->select(['id', 'name', 'description', 'created_at'])
            ->orderBy(['created_at' => SORT_DESC])
            ->with('articleAndCategory');
    }

    /**
     * @return ActiveQuery
     */
    public static function getAllCategories()
    {
        return ArticleCategory::find()
            ->select(['id','name','created_at'])
            ->orderBy(['created_at' => SORT_DESC]);
    }

    /**
     * @param $categories
     * @return array|ActiveRecord[]
     */
    public static function getArticleTagsByCategoriesId($categories)
    {
        // get article_id by categories_id
        $article_category = ArticleAndCategory::find()
            ->select(['category_id','article_id'])
            ->where(['category_id' => $categories])
            ->asArray()
            ->all();

        // get unique value of array
        $article_id = array_unique(ArrayHelper::getColumn($article_category, 'article_id'));

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