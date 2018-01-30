<?php

use backend\helpers\Html;
use yii\grid\GridView;
use backend\helpers\Date;

/* @var $this \backend\helpers\View */
/* @var $searchModel \backend\models\search\CollectionSearch */
/* @var $dataProvider \yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Collections');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="collection-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a(Yii::t('backend', 'Create') . Yii::t('backend', 'Collection'), ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'art_title',
                'art_id',
                [
                    'attribute' => 'created_at',
                    'value' => function ($model) {
                        return Date::show($model->created_at);
                    },
                ],
                [
                    'attribute' => 'updated_at',
                    'value' => function ($model) {
                        return Date::show($model->updated_at);
                    },
                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
