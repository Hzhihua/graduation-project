<?php
/**
 * @Author: cnzhihua
 * @Time: 18-1-21 11:04
 * @Github: https://github.com/Hzhihua
 */
/**
 * 分享链接按钮
 */

use frontend\helpers\View;
use frontend\assets\ShareAsset;
use frontend\helpers\Url;

/* @var $this \frontend\helpers\View */

ShareAsset::register($this);

$js = <<<JS
    var BLOG = { ROOT: '/', SHARE: true, REWARD: false };
JS;

$this->registerJs($js, View::POS_HEAD);

$currentUrl = Url::to(Url::current(), true);
?>

<!--分享链接按钮-->
<div class="mask" id="mask"></div>
<a href="javascript:" id="gotop" class="waves-effect waves-circle waves-light"><span class="icon icon-lg icon-chevron-up"></span></a>

<div class="global-share" id="globalShare">
    <ul class="reset share-icons">
        <li class="waves-effect waves-block">
            <a class="weibo share-sns" target="_blank" href="http://service.weibo.com/share/share.php?url=<?= $currentUrl ?>&amp;title=<?= $this->title ?>&amp;pic=" data-title="<?= Yii::t('frontend', 'Sina weibo') ?>">
                <i class="icon icon-weibo"></i>
            </a>
        </li>
        <li class="waves-effect waves-block">
            <a class="weixin share-sns wxFab" href="javascript:" data-title="<?= Yii::t('frontend', 'Wechat') ?>">
                <i class="icon icon-weixin"></i>
            </a>
        </li>
        <li class="waves-effect waves-block">
            <a class="qq share-sns" target="_blank" href="http://connect.qq.com/widget/shareqq/index.html?url=<?= $currentUrl ?>&amp;title=<?= $this->title ?>&amp;source=" data-title="QQ">
                <i class="icon icon-qq"></i>
            </a>
        </li>
        <li class="waves-effect waves-block">
            <a class="facebook share-sns" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= $currentUrl ?>" data-title="Facebook">
                <i class="icon icon-facebook"></i>
            </a>
        </li>
        <li class="waves-effect waves-block">
            <a class="twitter share-sns" target="_blank" href="https://twitter.com/intent/tweet?text=<?= $this->title ?>&amp;url=<?= $currentUrl ?>&amp;via=<?= Yii::$app->getRequest()->hostInfo ?>" data-title="Twitter">
                <i class="icon icon-twitter"></i>
            </a>
        </li>
        <li class="waves-effect waves-block">
            <a class="google share-sns" target="_blank" href="https://plus.google.com/share?url=<?= $currentUrl ?>" data-title="Google+">
                <i class="icon icon-google-plus"></i>
            </a>
        </li>
    </ul>
</div>


<div class="page-modal wx-share" id="wxShare">
    <a class="close" href="javascript:"><i class="icon icon-close"></i></a>
    <p>扫一扫，分享到微信</p>
    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAACWCAAAAAAZai4+AAABSklEQVR42u3aMRKDMAwFUe5/aaelsWe/BEXQqmISYj8KZMXWdeFYt+B38l8VQ5asD7HWMe73pNe7cRBdlqyRrN0bWpt+l1bIXLJkyeIskkrO48iSJavGqi29smTJ4iwyNJkyveeBWl6WrE+w+K5O//qV/S1Zsv6ctcLgW7erEbJkTWN1Ct90USeHNLJkTWbxo8202E3LYlmyZrLSKTvbQ3wLWJasaSzyMu+G5sUxoW9xsmSNYZ0TwfnHNVCw0yxL1jAW/8NZW7DjZVuWrJGsTmMBKbL5J7Jkyaq14vFxguQiS9ZIFi920wY+/sCogpAl63OsWitAmibicWTJGsaq9cV1jk/SFgRZsuaweFIg36bHNrJkyaq1C1wvxLaWlyVLVmkZ7hfZsmTJShMEP2KJcbJkjWQ9Wxan7USyZMniRW3n2LL2wLJkDWD9AOiLHVyVwVsnAAAAAElFTkSuQmCC" alt="微信分享二维码">
</div>

