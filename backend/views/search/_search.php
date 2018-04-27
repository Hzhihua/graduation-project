<?php

use backend\helpers\Html;
use backend\widgets\ActiveForm;

/* @var $model \backend\models\search\CommentSearch */
/* @var $this \yii\web\View */
/* @var $form \backend\widgets\ActiveForm */
?>

<div class="comment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'entity') ?>

    <?= $form->field($model, 'entityId') ?>

    <?= $form->field($model, 'content') ?>

    <?= $form->field($model, 'parentId') ?>

    <?= $form->field($model, 'level') ?>

    <?php // echo $form->field($model, 'createdBy') ?>

    <?php // echo $form->field($model, 'updatedBy') ?>

    <?php // echo $form->field($model, 'relatedTo') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'createdAt') ?>

    <?php // echo $form->field($model, 'updatedAt') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
