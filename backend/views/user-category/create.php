<?php

/* @var $this \backend\helpers\View */
/* @var $model \common\models\UserCategory */

$this->title = Yii::t('backend', 'Create') . Yii::t('backend', 'User Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'User Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-category-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
