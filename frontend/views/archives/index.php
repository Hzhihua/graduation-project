<?php
/**
 * @Author: cnzhihua
 * @Time: 18-2-25 09:17
 * @Github: https://github.com/Hzhihua
 */

use frontend\helpers\Date;
use frontend\helpers\Html;

/* @var $data array */
/* @var $article_tags array */
/* @var $article_categories array */
/* @var $this \yii\web\View */

$this->title = Yii::t('frontend', 'Archives');

$_data = [];
foreach ($data as $k => $v) {
    $_data[Date::show($v['public_time'], 'm, Y')][] = $data[$k];
}

?>

<?= $this->render('_header') ?>

<div class="container body-wrap fade in">

    <?php foreach ($_data as $_k => $_v): ?>
    <h3 class="archive-separator"><?= $_k ?></h3>
    <div class="waterfall in">

        <?php foreach ($_v as $__v): ?>
        <div class="waterfall-item">
            <article class="article-card archive-article">
                <div class="post-meta">
                    <time class="post-time" title="<?= Date::show($__v['public_time'], 'Y-m-d H:i:s')?>" datetime="<?= Date::show($__v['public_time'], 'Y-m-d\TH:i:s\Z')?>" itemprop="datePublished"><?= Date::show($__v['public_time'], 'Y-m-d')?></time>

                    <?= $this->render('_article_categories', [
                        'article_id' => $__v['id'],
                        'article_categories' => $article_categories,
                    ]) ?>

                </div>

                <h3 class="post-title" itemprop="name">
                    <?= Html::a(
                        $__v['title'],
                        [
                            '/article/view',
                            'id' => $__v['id'],
                        ],
                        ['class' => 'post-title-link']
                    ) ?>
                </h3>

                <div class="post-content" id="post-content" itemprop="postContent" style="height: 75px">
                    <?= $__v['description'] ?>
                    <?= Html::a(
                        Yii::t('frontend', 'Read More'),
                        [
                            '/article/view',
                            'id' => $__v['id'],
                        ],
                        [
                            'class' => 'post-more waves-effect waves-button',
                            'data-pjax' => 0,
                        ]
                    )?>
                </div>

                <?= $this->render('_article_tags', [
                    'article_id' => $__v['id'],
                    'article_tags' => $article_tags,
                ]) ?>

            </article>
        </div>

        <?php endforeach; ?>

    </div>

    <?php endforeach; ?>

</div>