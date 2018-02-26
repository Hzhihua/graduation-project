<?php
/**
 * @Author: cnzhihua
 * @Time: 18-2-26 20:28
 * @Github: https://github.com/Hzhihua
 */

namespace frontend\traits;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use hzhihua\articles\models\ArticleAndTag;
use hzhihua\articles\models\ArticleAndCategory;

trait ControllerTrait
{
    /**
     * @param $article_id int|array
     * @return array|ActiveRecord
     */
    public static function getArticleTagsByArticleId($article_id)
    {
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

    /**
     * @param $article_id int|array
     * @return array|ActiveRecord
     */
    public static function getArticleCategoriesByArticleId($article_id)
    {
        return ArticleAndCategory::find()
            ->select(['article_id', 'category_id'])
            ->with([
                'articleCategory' => function (ActiveQuery $query) {
                    $query->select(['id', 'name']);
                }
            ])
            ->where(['article_id' => $article_id])
            ->orderBy(['category_id' => SORT_DESC])
            ->asArray()
            ->all();
    }
}