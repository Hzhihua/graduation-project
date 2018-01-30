<?php

/* @var $this \backend\helpers\View */
/* @var $model \common\models\Collection */

$this->title = Yii::t('backend', 'Update') . Yii::t('backend', 'Collection') . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Collections'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="collection-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
