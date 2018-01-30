<?php

/* @var $this \backend\helpers\View */
/* @var $model \common\models\Comment */

$this->title = Yii::t('backend', 'Create') . Yii::t('backend', 'Comment');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Comments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
