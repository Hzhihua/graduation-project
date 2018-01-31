<?php

use backend\widgets\DetailView;
use backend\helpers\Html;
use backend\helpers\Date;

/* @var $this \yii\web\View */
/* @var $model \common\models\EmailVerify */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Email Verifies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-verify-view box box-primary">
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
                'user_id',
                'user_category_id',
                'email_verify_auth:email',
                [
                    'attribute' => 'email_verify_send_time',
                    'value' => function ($model) {
                        return Date::show($model->email_verify_send_time);
                    },
                ],
                'email_verify_expire:email',
            ],
        ]) ?>
    </div>
</div>
