<?php
/**
 * @Author: cnzhihua
 * @Time: 18-2-25 10:14
 * @Github: https://github.com/Hzhihua
 */

use frontend\helpers\Html;

/* @var $tagsData array */

$active = [];
$active['all'] = ' active ';
$paramId = (int) Yii::$app->getRequest()->get('id');
$count = count($tagsData);
foreach ($tagsData as $_v) {
    $id = (int) $_v['id'];
    if ($id === $paramId) {
        $active['all'] = '';
        $active[$id] = ' active ';
    } else {
        $active[$id] = '';
    }
}

$class = ' tags-list-item waves-effect waves-button waves-light ';
?>

<header class="content-header categories-header">

    <div class="container fade-scale in">
        <h1 class="title"><?= Yii::t('frontend', 'Tags')?></h1>
    </div>


    <div class="tabs-bar container">
        <nav class="tags-list">
            <?= Html::a(
                Yii::t('frontend', 'All'),
                [
                    '/tags/index',
                ],
                [
                    'class' => $class . $active['all'],
                ]
            )?>

            <?php foreach ($tagsData as $_v): ?>
                <?= Html::a(
                        $_v['name'],
                        [
                            '/tags/view',
                            'id' => $_v['id'],
                        ],
                        [
                            'class' => $class . $active[(int) $_v['id']],
                        ]
                )?>
            <?php endforeach; ?>

        </nav>
        <!-- PC show more-->
        <div class="tags-list-more">
            <a href="javascript:" onclick="BLOG.tabBar(this)" class="action tags-list-item waves-effect waves-circle waves-light"><i class="icon icon-ellipsis-h"></i></a>
        </div>
    </div>



</header>
