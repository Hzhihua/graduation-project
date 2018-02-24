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

    /**
     * Convert special HTML entities back to characters
     * @param string $html
     * @return string
     * @see http://php.net/manual/zh/function.htmlspecialchars-decode.php
     */
    public static function htmlDecode($html)
    {
        return htmlspecialchars_decode($html);
    }

    /**
     * Convert special characters to HTML entities
     * @param string $html
     * @return string
     * @see http://php.net/manual/zh/function.htmlspecialchars.php
     */
    public static function htmlEncode($html)
    {
        return htmlspecialchars($html);
    }
}