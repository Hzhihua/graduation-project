<?php
/**
 * @Author: cnzhihua
 * @Time: 18-1-21 11:15
 * @Github: https://github.com/Hzhihua
 */

namespace frontend\assets;


use yii\web\View;
use yii\web\AssetBundle;

class ShareAsset extends AssetBundle
{
    public $sourcePath = '@frontend/assets/static';
    public $js = [
        'waves.min.js',
    ];
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];

}