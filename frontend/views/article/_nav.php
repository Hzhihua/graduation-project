<?php
/**
 * @Author: cnzhihua
 * @Time: 18-1-22 10:59
 * @Github: https://github.com/Hzhihua
 */
/**
 * 文章上一篇，下一篇
 */

use frontend\helpers\Url;
use frontend\models\Article;

/* @var $data array */

$prevArticle = Article::getNavArticle(['<', 'public_time', $data['public_time']]);
$nextArticle = Article::getNavArticle(['>', 'public_time', $data['public_time']]);

?>
<!--nav start-->
<nav class="post-nav flex-row flex-justify-between">

    <div class="waves-block waves-effect prev">
        <?php if ($prevArticle): ?>
        <a href="<?= Url::to(['/article/view', 'id' => $prevArticle['id']]) ?>" id="post-prev" class="post-nav-link">
            <div class="tips"><i class="icon icon-angle-left icon-lg icon-pr"></i> 上一篇</div>
            <h4 class="title"><?= $prevArticle['title'] ?></h4>
        </a>
        <?php endif;?>
    </div>

    <div class="waves-block waves-effect next">
        <?php if ($nextArticle): ?>
        <a href="<?= Url::to(['/article/view', 'id' => $nextArticle['id']]) ?>" id="post-next" class="post-nav-link">
            <div class="tips"><i class="icon icon-angle-right icon-lg icon-ne"></i> 下一篇</div>
            <h4 class="title"><?= $nextArticle['title'] ?></h4>
        </a>
        <?php endif;?>
    </div>

</nav>
<!--nav end-->