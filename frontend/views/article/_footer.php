<?php
/**
 * @Author: cnzhihua
 * @Time: 18-1-22 10:57
 * @Github: https://github.com/Hzhihua
 */

use frontend\helpers\Url;

/* @var $data array */
/* @var $share string */
?>
<!--文章所属分类信息开始-->
<div class="post-footer">

    <ul class="article-tag-list">
        <?php foreach ($data['articleAndTag'] as $value):?>
        <li class="article-tag-list-item">
            <a class="article-tag-list-link waves-effect waves-button" href="<?= Url::to(['/tag/view', 'id' => $value['articleTag']['id']])?>"><?= $value['articleTag']['name'] ?></a>
        </li>
        <?php endforeach;?>
    </ul>
    <?= $share //分享链接按钮 ?>
</div>
<!--文章所属分类信息结束-->