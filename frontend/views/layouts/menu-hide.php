<?php
/**
 * @Author: cnzhihua
 * @Time: 18-1-22 10:36
 * @Github: https://github.com/Hzhihua
 */

use frontend\helpers\Url;
use frontend\helpers\Html;

$menu = [

];

?>

<div id="loading" class=""></div>

<aside id="menu" class="hide">
    <div class="inner flex-row-vertical">
        <a href="javascript:" class="header-icon waves-effect waves-circle waves-light" id="menu-off">
            <i class="icon icon-lg icon-close"></i>
        </a>
        <div class="brand-wrap" style="background-image:url(<?= Url::to('img/brand.jpg') ?>)">
            <div class="brand">
                <a href="http://blog.hzhihua.top/" class="avatar waves-effect waves-circle waves-light">
                    <?= Html::img(Url::to('img/18823393'))?>
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
                    <a href="">
                        <i class="icon icon-lg icon-home"></i>
                        主页
                    </a>
                </li>

                <li class="waves-block waves-effect">
                    <a href="http://blog.hzhihua.top/archives">
                        <i class="icon icon-lg icon-archives"></i>
                        文档
                    </a>
                </li>

                <li class="waves-block waves-effect">
                    <a href="http://blog.hzhihua.top/tags">
                        <i class="icon icon-lg icon-tags"></i>
                        标签云
                    </a>
                </li>

                <li class="waves-block waves-effect">
                    <a href="http://blog.hzhihua.top/categories">
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
