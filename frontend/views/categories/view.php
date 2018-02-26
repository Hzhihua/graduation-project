<?php
/**
 * @Author: cnzhihua
 * @Time: 18-2-25 12:12
 * @Github: https://github.com/Hzhihua
 */

use frontend\helpers\Date;
use frontend\helpers\Html;

/* @var $data array article_category data */
/* @var $article_tags array */
/* @var $categoriesData array */
/* @var $this \yii\web\View */

$this->title = sprintf('%s -- %s',
    $data['name'],
    Yii::t('frontend', 'Categories')
);

?>

<?= $this->render('_header', ['categoriesData' => $categoriesData]) ?>

<div class="container body-wrap fade in">
    <?php if ('view' === Yii::$app->controller->action->id):?>
        <h5 class="subtitle archive-separator" style="color: inherit;font-size: inherit"><?= $data['description']?></h5>
    <?php endif; ?>

        <div class="waterfall in">

            <?php foreach ($data['articleAndCategory'] as $_v): ?>
                <div class="waterfall-item">
                    <article class="article-card archive-article">
                        <div class="post-meta">
                            <time class="post-time" title="<?= Date::show($data['created_at'], 'Y-m-d H:i:s') ?>" datetime="<?= Date::show($data['created_at'], 'Y-m-d\TH:i:s\Z') ?>" itemprop="datePublished"><?= Date::show($data['created_at'], 'Y-m-d') ?></time>

                            <ul class="article-category-list">
                                <li class="article-category-list-item">
                                    <?= Html::a(
                                        $data['name'],
                                        [
                                            '/categories/view',
                                            'id' => $data['id']
                                        ],
                                        ['class' => 'article-category-list-link']
                                    )?>
                                </li>
                            </ul>

                        </div>

                        <h3 class="post-title" itemprop="name">
                            <?= Html::a(
                                $_v['article']['title'],
                                [
                                    '/article/view',
                                    'id' => $_v['article']['id']
                                ],
                                ['class' => 'post-title-link']
                            )?>
                        </h3>

                        <div class="post-content" id="post-content" itemprop="postContent" style="height: 75px">
                            <?= $_v['article']['description'] ?>
                            <?= Html::a(
                                Yii::t('frontend', 'Read More'),
                                [
                                    '/article/view',
                                    'id' => $_v['article']['id'],
                                ],
                                ['class' => 'post-more waves-effect waves-button']
                            )?>
                        </div>

                        <?= $this->render('_article_tags', [
                            'article_id' => $_v['article']['id'],
                            'article_tags' => $article_tags,
                        ])?>

                    </article>
                </div>
            <?php endforeach; ?>

        </div>

</div>
