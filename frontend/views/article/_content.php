<?php
/**
 * @Author: cnzhihua
 * @Time: 18-1-22 11:22
 * @Github: https://github.com/Hzhihua
 */

use frontend\helpers\Url;
use frontend\helpers\Html;
use frontend\helpers\Date;

/* @var $data array */
/* @var $copyright string */
/* @var $footer string */

$updated_at = Date::show($data['updated_at']);

?>

<div class="post-card">
    <h1 class="post-card-title"><?= $data['title'] ?></h1>
    <div class="post-meta">
        <time class="post-time" title="<?= $updated_at ?>" datetime="<?= Date::show($data['updated_at'], 'Y-m-d\TH:i:s\Z') ?>" itemprop="datePublished"><?= $updated_at ?></time>

        <ul class="article-category-list">
            <?php foreach ($data['articleAndCategory'] as $value):?>
            <li class="article-category-list-item">
                <a class="article-category-list-link" href="<?= Url::to(['/category/view', 'id' => $value['articleCategory']['id']])?>"><?= $value['articleCategory']['name']?></a>
            </li>
            <?php endforeach;?>
        </ul>

<!--        <span id="busuanzi_container_page_pv" title="--><?//= Yii::t('frontend', 'Counts')?><!--" style="display: inline;">-->
<!--            <i class="icon icon-eye icon-pr"></i>-->
<!--            <span id="busuanzi_value_page_pv">7</span>-->
<!--        </span>-->
    </div>

    <div class="post-content" id="post-content" itemprop="postContent">
        <?= Html::htmlDecode($data['preview_content']) ?>
    </div>


    <?= $copyright // 版权信息 ?>
    <?= $footer // 文章标签云信息 ?>
</div>