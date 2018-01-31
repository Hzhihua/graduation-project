<?php

use backend\helpers\Html;
use backend\widgets\ActiveForm;

/* @var $model \common\models\SystemConfig */
/* @var $this \yii\web\View */
/* @var $form \backend\widgets\ActiveForm */
?>

<div class="system-config-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'user_id')->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
