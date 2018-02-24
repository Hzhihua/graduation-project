<?php
/**
 * @Author: cnzhihua
 * @Time: 18-1-22 11:16
 * @Github: https://github.com/Hzhihua
 */

use frontend\helpers\Url;

/* @var $data array */

$this->title = $data['title'];
$currentUrl = Url::to(Url::current(), true);

?>
<!--链接分享按钮开始-->
<div class="page-share-wrap">

    <div class="page-share" id="pageShare">
        <ul class="reset share-icons">
            <li>
                <a class="weibo share-sns" target="_blank" href="http://service.weibo.com/share/share.php?url=<?= $currentUrl ?>&amp;title=<?= $this->title ?>&amp;pic=https://avatars3.githubusercontent.com/u/18823393?s=460&amp;v=4" data-title="<?= Yii::t('frontend', 'Sina weibo')?>">
                    <i class="icon icon-weibo"></i>
                </a>
            </li>
            <li>
                <a class="weixin share-sns wxFab" href="javascript:" data-title="<?= Yii::t('frontend', 'Wechat')?>">
                    <i class="icon icon-weixin"></i>
                </a>
            </li>
            <li>
                <a class="qq share-sns" target="_blank" href="http://connect.qq.com/widget/shareqq/index.html?url=<?= $currentUrl ?>&amp;title=<?= $this->title ?>&amp;source=" data-title="QQ">
                    <i class="icon icon-qq"></i>
                </a>
            </li>
            <li>
                <a class="facebook share-sns" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=" data-title="Facebook">
                    <i class="icon icon-facebook"></i>
                </a>
            </li>
            <li>
                <a class="twitter share-sns" target="_blank" href="https://twitter.com/intent/tweet?text=<?= $this->title ?>&amp;url=<?= $currentUrl ?>&amp;via=<?= Yii::$app->getRequest()->hostInfo ?>" data-title="Twitter">
                    <i class="icon icon-twitter"></i>
                </a>
            </li>
            <li>
                <a class="google share-sns" target="_blank" href="https://plus.google.com/share?url=<?= $currentUrl ?>" data-title="Google+">
                    <i class="icon icon-google-plus"></i>
                </a>
            </li>
        </ul>
    </div>



    <a href="javascript:" id="shareFab" class="page-share-fab waves-effect waves-circle">
        <i class="icon icon-share-alt icon-lg"></i>
    </a>
</div>
<!--链接分享按钮结束-->
