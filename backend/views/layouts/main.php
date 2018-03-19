<?php
use backend\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

backend\assets\AppAsset::register($this);
dmstr\web\AdminLteAsset::register($this);

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>
<?php if ('login' === Yii::$app->controller->action->id): ?>
    <?= $this->render('main-login', ['content' => $content]) ?>
<?php else: ?>
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
        ]) ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition <?= \dmstr\helpers\AdminLteHelper::skinClass() ?> sidebar-mini" <?= isset($this->closeMenu) ? 'sidebar-collapse' : ''?>>
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>

        <?= $this->render('left.php', ['directoryAsset' => $directoryAsset]) ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php endif; ?>
