<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\Share */

$this->title = Yii::t('backend', 'Create') . Yii::t('backend', 'Share');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Shares'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="share-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
