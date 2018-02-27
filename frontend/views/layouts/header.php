<?php
/**
 * @Author: cnzhihua
 * @Time: 18-1-21 10:30
 * @Github: https://github.com/Hzhihua
 */

use frontend\helpers\Html;

/* @var $this \yii\web\View */

?>

<header class="content-header archives-header">

    <div class="container fade-scale in">
        <h1 class="title"><?= Html::htmlEncode(isset($this->params['title']) ? $this->params['title'] : $this->title) ?></h1>
        <h5 class="subtitle"><?= Html::htmlEncode(isset($this->params['subtitle']) ? $this->params['subtitle'] : '') ?></h5>
    </div>

    <?= isset($this->params['bar']) ? $this->params['bar'] : '' ?>

</header>

