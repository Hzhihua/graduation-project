<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use frontend\helpers\Html;

$this->title = $name;
?>

<div class="container body-wrap">
    <div class="site-error">

        <h1><?= Html::encode($message) ?></h1>

        <p>
            <?= Yii::t('frontend', 'The above error occurred while the Web server was processing your request.')?>
        </p>
        <p>
            <?= Yii::t('frontend', 'Please contact us if you think this is a server error. Thank you.') ?>
        </p>

    </div>
</div>
