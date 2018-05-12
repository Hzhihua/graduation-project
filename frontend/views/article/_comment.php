<?php
/**
 * @Author: cnzhihua
 * @Time: 18-2-4 14:28
 * @Github: https://github.com/Hzhihua
 */

use frontend\helpers\Url;
use frontend\helpers\Html;
use yii2mod\comments\widgets\Comment;

/* @var $model \yii\db\ActiveRecord*/

$relatedTo = Yii::$app->getUser()->isGuest
    ? ''
    : sprintf('User %s commented on the page %s',
        Yii::$app->getUser()->identity->username,
        Url::current()
        );

$emptyText = Yii::t('frontend', 'No comments found.') . Yii::$app->getUser()->isGuest ?
    Html::a(Yii::t('frontend', 'Post a comment'), ['/user/security/login'])
    : '';

?>
<?= Comment::widget([
    'model' => $model,
    'relatedTo' => $relatedTo,
    'maxLevel' => 2,
    'dataProviderConfig' => [
        'pagination' => [
            'pageSize' => 10
        ],
    ],
    'listViewConfig' => [
        'emptyText' => $emptyText,
    ],
]); ?>
