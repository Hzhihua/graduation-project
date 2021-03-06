<?php

use backend\widgets\DetailView;
use backend\helpers\Html;
use backend\helpers\Date;

/* @var $this \yii\web\View */
/* @var $model \common\models\Comment */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Comments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-view box box-primary">
    <div class="box-header">
        <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'entity',
                'entityId',
                'content:ntext',
                'parentId',
                'level',
                'createdBy',
                'updatedBy',
                'relatedTo',
                'url:ntext',
                'status',
                'createdAt',
                'updatedAt',
            ],
        ]) ?>
    </div>
</div>
