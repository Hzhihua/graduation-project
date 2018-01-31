<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\SystemConfig */

$this->title = Yii::t('backend', 'Update') . Yii::t('backend', 'System Config') . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'System Configs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="system-config-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
