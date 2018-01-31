<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\Collection */

$this->title = Yii::t('backend', 'Create') . Yii::t('backend', 'Collection');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Collections'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="collection-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
