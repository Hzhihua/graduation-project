<?php
/**
 * @Author: cnzhihua
 * @Time: 18-1-22 11:10
 * @Github: https://github.com/Hzhihua
 */

use frontend\helpers\Html;
use frontend\helpers\Url;
use frontend\helpers\Date;

/* @var $data array */

$absoluteUrl = Url::to('', true);

?>
<!--版权信息开始-->
<blockquote class="post-copyright">
    <div class="content">

<span class="post-time">
    最後更新時間：<time datetime="<?= Date::show($data['updated_at'], 'Y-m-d\TH:i:s\Z')?>" itemprop="dateUpdated"><?= Date::show($data['updated_at']) ?></time>
</span><br>
        转载务必注明原文出处！<br>原文链接：<?= Html::a($absoluteUrl, $absoluteUrl, ['target' => '_self'])?>

    </div>
    <footer>
<!--        --><?//= Html::a(
//                Html::img('static/18823393', ['alt' => 'Hzhihua']).'Hzhihua',
//                Yii::$app->getRequest()->hostInfo
//        )?>
    </footer>
</blockquote>
<!--版权信息结束-->
