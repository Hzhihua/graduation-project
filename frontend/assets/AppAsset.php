<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@frontend/assets/static';
//    public $basePath
//    public $baseUrl = '@web/static';
    public $css = [
        'style.css',
    ];
    public $js = [
//        'busuanzi.pure.mini.js',
        'main.min.js',
//        'search.min.js',
//        'waves.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
