<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\CommentStatus */

$this->title = Yii::t('backend', 'Create') . Yii::t('backend', 'Comment Status');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Comment Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-status-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
