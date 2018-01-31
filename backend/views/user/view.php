<?php

use backend\widgets\DetailView;
use backend\helpers\Html;
use backend\helpers\Date;

/* @var $this \yii\web\View */
/* @var $model \common\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view box box-primary">
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
                'username',
                'auth_key',
                'password',
                'password_reset_token',
                'email:email',
                [
                    'attribute' => 'is_email_pass',
                    'value' => function ($model) {
                        if ($model->is_email_pass) return '是';
                        else return '否';
                    },
                ],
                'user_category_id',
                'user_status_id',
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
            ],
        ]) ?>
    </div>
</div>
