<?php
/**
 * @Author: cnzhihua
 * @Time: 18-2-26 19:55
 * @Github: https://github.com/Hzhihua
 */

use frontend\helpers\Html;

/* @var $article_id int */
/* @var $article_categories array */
/**
 * $article_categories = ArticleAndTag::find()
 *  ->select(['article_id', 'tag_id'])
 *  ->with([
 *  'articleTag' => function (ActiveQuery $query) {
 *  $query->select(['id', 'name']);
 *  }
 *  ])
 *  ->where(['article_id' => ['1', '2', '3']])
 *  ->orderBy(['tag_id' => SORT_DESC])
 *  ->asArray()
 *  ->all();
 */

?>

<ul class="article-category-list">
    <?php foreach ($article_categories as $_category): ?>
        <?php if ((int) $article_id === (int) $_category['article_id']): ?>
        <li class="article-category-list-item">
            <?= Html::a(
                $_category['articleCategory']['name'],
                [
                    '/categories/view',
                    'id' => $_category['articleCategory']['id'],
                ],
                ['class' => 'article-category-list-link']
            ) ?>
        </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
