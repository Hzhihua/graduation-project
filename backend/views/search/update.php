<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\Comment */

$this->title = Yii::t('backend', 'Update') . Yii::t('backend', 'Comment') . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Comments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="comment-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
