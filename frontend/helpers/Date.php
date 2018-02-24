<?php
/**
 * @Author: Hzhihua
 * @Time: 2018/1/29 11:43
 * @Github: https://github.com/Hzhihua
 */


namespace frontend\helpers;

/**
 * Class Date
 *
 * 时间日期显示格式
 *
 * @package frontend\helpers
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class Date
{
    public static function show($timestamp, $format = 'Y-m-d H:i:s')
    {
        return date($format, $timestamp);
    }
}