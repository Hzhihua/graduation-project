<?php

use backend\helpers\Html;
use backend\widgets\ActiveForm;

/* @var $model \common\models\UserCategory */
/* @var $this \backend\helpers\View */
/* @var $form \backend\widgets\ActiveForm */
?>

<div class="user-category-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
