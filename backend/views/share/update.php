<?php

/* @var $this \backend\helpers\View */
/* @var $model \common\models\Share */

$this->title = Yii::t('backend', 'Update') . Yii::t('backend', 'Share') . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Shares'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="share-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
