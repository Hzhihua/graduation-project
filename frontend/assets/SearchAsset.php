<?php
/**
 * @Author: cnzhihua
 * @Time: 18-1-21 11:12
 * @Github: https://github.com/Hzhihua
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class SearchAsset extends AssetBundle
{
    public $sourcePath = '@frontend/assets/static';
    public $js = [
        'search.min.js',
        'busuanzi.pure.mini.js',
    ];

}