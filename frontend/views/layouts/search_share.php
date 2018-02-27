<?php
/**
 * @Author: cnzhihua
 * @Time: 18-2-27 09:32
 * @Github: https://github.com/Hzhihua
 */

/* @var $this \yii\web\View */

?>

<header class="top-header" id="header">
    <div class="flex-row">
        <a href="javascript:" class="header-icon waves-effect waves-circle waves-light on" id="menu-toggle">
            <i class="icon icon-lg icon-navicon"></i>
        </a>
        <div class="flex-col header-title ellipsis">黄志华的博客</div>

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

<?= $this->render('search') ?>
<?= $this->render('share') ?>
