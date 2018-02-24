<?php
/**
 * @Author: cnzhihua
 * @Time: 18-1-22 10:44
 * @Github: https://github.com/Hzhihua
 */
/**
 * 文章头部
 */

use frontend\helpers\Date;

/* @var $data array */
/* @var $this \frontend\helpers\View */

?>
<header class="top-header" id="header">
    <div class="flex-row">
        <a href="javascript:" class="header-icon waves-effect waves-circle waves-light on" id="menu-toggle">
            <i class="icon icon-lg icon-navicon"></i>
        </a>
        <div class="flex-col header-title ellipsis"><?= $data['title'] ?></div>

        <div class="search-wrap" id="search-wrap">
            <a href="javascript:" class="header-icon waves-effect waves-circle waves-light" id="back">
                <i class="icon icon-lg icon-chevron-left"></i>
            </a>
            <input id="key" class="search-input" autocomplete="off" placeholder="<?= Yii::t('frontend', 'Search') ?>">
            <a href="javascript:" class="header-icon waves-effect waves-circle waves-light" id="search">
                <i class="icon icon-lg icon-search"></i>
            </a>
        </div>


        <a href="javascript:" class="header-icon waves-effect waves-circle waves-light" id="menuShare">
            <i class="icon icon-lg icon-share-alt"></i>
        </a>

    </div>
</header>
<header class="content-header post-header">

    <div class="container fade-scale in">
        <h1 class="title"><?= $data['title'] ?></h1>
        <h5 class="subtitle">

            <time datetime="<?= Date::show($data['public_time'], 'Y-m-d\TH:i:s\Z') ?>" itemprop="datePublished" class="page-time">
                <?= Date::show($data['public_time']) ?>
            </time>


            <ul class="article-category-list">
                <li class="article-category-list-item">
                    <a class="article-category-list-link" href="">
                        算法(第四版)
                    </a>
                </li>
            </ul>


        </h5>
    </div>

</header>
