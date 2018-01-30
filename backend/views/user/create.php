<?php

/* @var $this \backend\helpers\View */
/* @var $model \common\models\User */

$this->title = Yii::t('backend', 'Create') . Yii::t('backend', 'User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
