<?php
/**
 * Created by PhpStorm.
 * User: cnzhihua
 * Date: 18-4-17
 * Time: 下午3:57
 */

namespace backend\assets;


use yii\web\AssetBundle;

class JqueryMigrateAsset extends AssetBundle
{
    public $sourcePath = '@backend/assets/source';
    public $js = [
        // yii2-admin 添加菜单填写url时出现 “elem.getClientRects is not a function" when using jQuery 3.0”问题，界面混乱解决办法：
        // @see https://github.com/vanderlee/colorpicker/issues/132#issuecomment-344177767
        // 'https://code.jquery.com/jquery-migrate-3.0.0.min.js',

        'js/jquery-migrate-3.0.0.min.js',
    ];
}