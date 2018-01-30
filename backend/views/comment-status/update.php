<?php

/* @var $this \backend\helpers\View */
/* @var $model \common\models\CommentStatus */

$this->title = Yii::t('backend', 'Update') . Yii::t('backend', 'Comment Status') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Comment Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="comment-status-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
