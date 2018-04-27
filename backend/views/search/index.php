<?php

use backend\helpers\Html;
use backend\grid\GridView;
use backend\helpers\Date;

/* @var $this \yii\web\View */
/* @var $searchModel \backend\models\search\CommentSearch */
/* @var $dataProvider \yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Comments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a(Yii::t('backend', 'Create') . Yii::t('backend', 'Comment'), ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

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

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
