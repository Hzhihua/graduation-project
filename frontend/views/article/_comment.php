<?php
/**
 * @Author: cnzhihua
 * @Time: 18-2-4 14:28
 * @Github: https://github.com/Hzhihua
 */

use frontend\helpers\Url;
use yii2mod\comments\widgets\Comment;

/* @var $model \yii\db\ActiveRecord*/

$relatedTo = Yii::$app->getUser()->isGuest
    ? ''
    : sprintf('User %s commented on the page %s',
        Yii::$app->getUser()->identity->username,
        Url::current()
        );

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
        'emptyText' => Yii::t('frontend', 'No comments found.'),
    ],
]); ?>
