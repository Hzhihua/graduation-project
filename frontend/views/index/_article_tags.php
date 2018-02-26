<?php
/**
 * @Author: cnzhihua
 * @Time: 18-2-26 17:58
 * @Github: https://github.com/Hzhihua
 */

use frontend\helpers\Html;

/* @var $article_id int */
/* @var $article_tags array */

/**
 * $article_tags = ArticleAndTag::find()
 * ->with('articleTag')
 * ->where(['article_id' => ['1', '2', '3']])
 * ->asArray()
 * ->all();
 */

?>

<div class="post-footer">
    <?php foreach ($article_tags as $_tag): ?>
        <?php if ((int) $_tag['article_id'] === (int) $article_id): ?>
            <li class="article-tag-list-item">
                <?= Html::a(
                    $_tag['articleTag']['name'],
                    [
                        '/tags/view',
                        'id' => $_tag['articleTag']['id']
                    ],
                    ['class' => 'article-tag-list-link waves-effect waves-button']
                )?>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>

</div>
