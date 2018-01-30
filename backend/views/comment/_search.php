<?php

use yii\helpers\Html;
use backend\widgets\ActiveForm;

/* @var $model \backend\models\search\CommentSearch */
/* @var $this \backend\helpers\View */
/* @var $form \backend\widgets\ActiveForm */
?>

<div class="comment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'art_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'is_top') ?>

    <?= $form->field($model, 'to_comment_id') ?>

    <?= $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'count_up') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
