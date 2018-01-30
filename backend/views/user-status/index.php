<?php

use backend\helpers\Html;
use yii\grid\GridView;
use backend\helpers\Date;

/* @var $this \backend\helpers\View */
/* @var $searchModel \backend\models\search\UserStatusSearch */
/* @var $dataProvider \yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'User Statuses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-status-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a(Yii::t('backend', 'Create') . Yii::t('backend', 'User Status'), ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'name',
                [
                    'attribute' => 'is_allow_login',
                    'value' => function ($model) {
                        if ($model->is_allow_login) return '是';
                        else return '否';
                    },
                ],
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
