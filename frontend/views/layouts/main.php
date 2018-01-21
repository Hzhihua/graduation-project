<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\helpers\View;
use frontend\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);

$js = <<<JS
    window.lazyScripts=[];
JS;

$this->registerJs($js, View::POS_HEAD);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <?= Html::metaAll([
        [
            'http-equiv' => 'X-UA-Compatible',
            'content' => 'IE=edge',
        ],
        [
            'name' => 'viewport',
            'content' => 'width=device-width, initial-scale=1',
        ],
        [
            'name' => 'theme-color',
            'content' => '#3F51B5',
        ],
        [
            'name' => 'keywords',
            'content' => 'PHP,Yii2,Python,java,算法',
        ],
    ]) ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?= $this->render('menu.php') ?>
    <?= $this->render('search.php') ?>
    <?= $this->render('share.php') ?>
    <main id="main">
        <?= $this->render('header.php') ?>
        <div class="container body-wrap">
            <?= $content ?>
        </div>
        <?= $this->render('footer.php') ?>
    </main>
</div>

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>