<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\UserCategory */

$this->title = Yii::t('backend', 'Update') . Yii::t('backend', 'User Category') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'User Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="user-category-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
