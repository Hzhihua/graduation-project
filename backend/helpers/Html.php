<?php
/**
 * @Author: Hzhihua
 * @Time: 2018/1/27 22:15
 * @Github: https://github.com/Hzhihua
 */

namespace backend\helpers;

use Yii;

class Html extends \yii\helpers\Html
{
    /**
     * 遍历生成meta标签
     * @param array $options
     * @return string
     */
    public static function metaAll(array $options)
    {
        $meta = self::tag('meta', '', ['charset' => Yii::$app->charset]);
        foreach ($options as $option) {
            $meta .= self::tag('meta', '', $option);
        }
        return $meta . self::csrfMetaTags();
    }

    public static function menuTag(array $options)
    {
        $iTag = self::tag('i', '', $options['i']);
        return self::a($iTag, $options['url'], $options['a']);
    }

    public static function activeDropDownList($model, $attribute, $items, $options = [])
    {
        $options = array_merge(['class' => 'form-control'], $options);
        return parent::activeDropDownList($model, $attribute, $items, $options);
    }
}