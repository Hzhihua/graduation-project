<?php
/**
 * @Author: cnzhihua
 * @Time: 18-1-21 11:10
 * @Github: https://github.com/Hzhihua
 */
/* @var $this \yii\web\View */

use frontend\assets\SearchAsset;
SearchAsset::register($this);

?>
<!--搜索按钮框-->
<div class="search-panel" id="search-panel">
    <ul class="search-result" id="search-result"></ul>
</div>
<template id="search-tpl"></template>
