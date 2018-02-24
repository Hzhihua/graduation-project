<?php
/**
 * @Author: cnzhihua
 * @Time: 18-1-21 10:30
 * @Github: https://github.com/Hzhihua
 */

use frontend\helpers\Url;
use frontend\helpers\Html;

$menu = [

];

?>

<div id="loading" class=""></div>

<aside id="menu">
    <div class="inner flex-row-vertical">
        <a href="javascript:" class="header-icon waves-effect waves-circle waves-light" id="menu-off">
            <i class="icon icon-lg icon-close"></i>
        </a>
        <div class="brand-wrap" style="background-image:url(<?= Url::to('/img/brand.jpg') ?>)">
            <div class="brand">
                <a href="http://blog.hzhihua.top/" class="avatar waves-effect waves-circle waves-light">
                    <?= Html::img(Url::to('https://avatars3.githubusercontent.com/u/18823393?s=460&v=4'))?>
                </a>
                <hgroup class="introduce">
                    <h5 class="nickname">Hzhihua</h5>
                    <a href="mailto:cnzhihua@gmail.com" title="cnzhihua@gmail.com" class="mail">cnzhihua@gmail.com</a>
                </hgroup>
            </div>
        </div>
        <div class="scroll-wrap flex-col">
            <ul class="nav">

                <li class="waves-block waves-effect">
                    <a href="<?= Url::to(['/index'])?>">
                        <i class="icon icon-lg icon-home"></i>
                        主页
                    </a>
                </li>

                <li class="waves-block waves-effect">
                    <a href="<?= Url::to(['/archives'])?>">
                        <i class="icon icon-lg icon-archives"></i>
                        文档
                    </a>
                </li>

                <li class="waves-block waves-effect">
                    <a href="<?= Url::to(['/tags'])?>">
                        <i class="icon icon-lg icon-tags"></i>
                        标签云
                    </a>
                </li>

                <li class="waves-block waves-effect">
                    <a href="<?= Url::to(['/categories'])?>">
                        <i class="icon icon-lg icon-th-list"></i>
                        分类
                    </a>
                </li>

                <li class="waves-block waves-effect">
                    <a href="https://github.com/Hzhihua" target="_blank">
                        <i class="icon icon-lg icon-github"></i>
                        Github
                    </a>
                </li>

            </ul>
        </div>
    </div>
</aside>
