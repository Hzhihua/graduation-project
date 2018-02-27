<?php
/**
 * @Author: cnzhihua
 * @Time: 18-2-25 10:14
 * @Github: https://github.com/Hzhihua
 */

use frontend\helpers\Html;

/* @var $categoriesData array */

$active = [];
$active['all'] = ' active ';
$paramId = (int) Yii::$app->getRequest()->get('id');
foreach ($categoriesData as $_v) {
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

<div class="tabs-bar container">
    <nav class="tags-list">
        <?= Html::a(
            Yii::t('frontend', 'All'),
            [
                '/categories/index',
            ],
            [
                'class' => $class . $active['all'],
            ]
        )?>

        <?php foreach ($categoriesData as $_v): ?>
            <?= Html::a(
                    $_v['name'],
                    [
                        '/categories/view',
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
        <a href="javascript:" onclick="BLOG.tabBar(this)" class="action tags-list-item waves-effect waves-circle waves-light">
            <i class="icon icon-ellipsis-h"></i>
        </a>
    </div>
</div>

