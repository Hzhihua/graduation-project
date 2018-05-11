<?php
/**
 * @Author: cnzhihua
 * @Time: 18-1-21 10:30
 * @Github: https://github.com/Hzhihua
 */

use frontend\helpers\Url;
use frontend\helpers\Html;

/* @var $this \yii\web\View */

$close = isset($closeMenu) && !empty($closeMenu) ? 'class="hide"' : '';

$css = <<<'CSS'
#menu .nav a {
    padding-left: 57px;
    padding-top: 1px;
}
CSS;

$this->registerCss($css);
?>

<div id="loading" class=""></div>

<aside id="menu" <?= $close ?> >
    <div class="inner flex-row-vertical">
        <a href="javascript:" class="header-icon waves-effect waves-circle waves-light" id="menu-off">
            <i class="icon icon-lg icon-close"></i>
        </a>
        <div class="brand-wrap" style="background-image:url(<?= rtrim(Yii::$app->params['baseUrl'], '/') . '/brand.jpg' ?>)">
            <div class="brand">
                <a href="<?= Url::to(['/'])?>" class="avatar waves-effect waves-circle waves-light">
                    <?= Html::img(Url::to('https://avatars3.githubusercontent.com/u/18823393?s=460&v=4'))?>
                </a>
                <hgroup class="introduce">
                    <h5 class="nickname">Hzhihua</h5>
                    <?= Html::a(
                        'cnzhihua@gmail.com',
                        'mailto:cnzhihua@gmail.com',
                        [
                            'class' => 'mail',
                            'title' => 'cnzhihua@gmail.com',
                        ]
                    ) ?>
                </hgroup>
            </div>
        </div>
        <div class="scroll-wrap flex-col">
            <ul class="nav">

                <li class="waves-block waves-effect">
                    <a href="<?= Url::to(['/index'])?>">
                        <i class="icon icon-lg icon-home"></i>
                        <?= Yii::t('frontend', 'Home') ?>
                    </a>
                </li>

                <li class="waves-block waves-effect">
                    <a href="<?= Url::to(['/archives'])?>">
                        <i class="icon icon-lg icon-archives"></i>
                        <?= Yii::t('frontend', 'Archives') ?>
                    </a>
                </li>

                <li class="waves-block waves-effect">
                    <a href="<?= Url::to(['/tags'])?>">
                        <i class="icon icon-lg icon-tags"></i>
                        <?= Yii::t('frontend', 'Tags') ?>
                    </a>
                </li>

                <li class="waves-block waves-effect">
                    <a href="<?= Url::to(['/categories'])?>">
                        <i class="icon icon-lg icon-th-list"></i>
                        <?= Yii::t('frontend', 'Categories') ?>
                    </a>
                </li>

                <li class="waves-block waves-effect">
                    <a href="https://github.com/Hzhihua" target="_blank">
                        <i class="icon icon-lg icon-github"></i>
                        Github
                    </a>
                </li>

                <li class="waves-block waves-effect">
                    <?php if (Yii::$app->getUser()->isGuest): ?>
                    <a href="<?= Url::to(['/user/security/login'])?>">
                        <i class="icon icon-lg icon-user"></i>
                        <?= Yii::t('frontend', 'Sign in') ?>
                    </a>

                    <?php else: ?>
                    <a href="<?= Url::to(['/user/logout'])?>" data-method="post" onclick="return confirm('<?= Yii::t('frontend', 'Are you sure to logout?') ?>')">
                        <i class="icon icon-lg icon-user"></i>
                        <?= Yii::$app->getUser()->identity->username ?>
                    </a>
                    <?php endif; ?>

                </li>

            </ul>
        </div>
    </div>
</aside>
