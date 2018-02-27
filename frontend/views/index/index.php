<?php
/**
* @Author: cnzhihua
* @Time: 18-1-21 10:30
* @Github: https://github.com/Hzhihua
*/

use frontend\helpers\Date;
use frontend\helpers\Html;

/* @var $this \yii\web\View */
/* @var $article_tags array */
/* @var $article_categories array */

$this->title = '首页';
$this->params['title'] = '黄志华的博客';
?>

<div class="container body-wrap">
    <ul class="post-list">
        <?php foreach ($data as $_k => $_v): ?>
        <li class="post-list-item fade in">
            <article class="article-card article-type-post" itemprop="blogPost">
                <div class="post-meta">
                    <time class="post-time" title="<?= Date::show($_v['public_time'], 'Y-m-d H:i:s')?>" datetime="<?= Date::show($_v['public_time'], 'Y-m-d\TH:i:s\Z')?>" itemprop="datePublished"><?= Date::show($_v['public_time'], 'Y-m-d')?></time>

                    <?= $this->render('_article_categories', [
                        'article_id' => $_v['id'],
                        'article_categories' => $article_categories,
                    ]) ?>

                </div>

                <h3 class="post-title" itemprop="name">
                    <?= Html::a(
                        $_v['title'],
                        [
                            '/article/view',
                            'id' => $_v['id'],
                        ],
                        ['class' => 'post-title-link']
                    ) ?>
                </h3>

                <div class="post-content" id="post-content" itemprop="postContent" style="height: 75px">
                    <?= $_v['description'] ?>
                    <?= Html::a(
                        Yii::t('frontend', 'Read More'),
                        [
                            '/article/view',
                            'id' => $_v['id'],
                        ],
                        [
                            'class' => 'post-more waves-effect waves-button',
                            'data-pjax' => 0,
                        ]
                    )?>
                </div>

                <?= $this->render('_article_tags', [
                    'article_id' => $_v['id'],
                    'article_tags' => $article_tags,
                ]) ?>

            </article>

        </li>
        <?php endforeach; ?>
    </ul>
</div>