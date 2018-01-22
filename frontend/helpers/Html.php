<?php
/**
 * @Author: cnzhihua
 * @Time: 18-1-21 10:08
 * @Github: https://github.com/Hzhihua
 */

namespace frontend\helpers;

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
}