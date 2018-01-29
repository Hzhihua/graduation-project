<?php
/**
 * @Author: Hzhihua
 * @Time: 2018/1/29 12:18
 * @Github: https://github.com/Hzhihua
 */

class AttributeHandle
{
    /**
     * 处理日期格式
     * @param $attribute
     * @return string
     */
    public static function Date($attribute)
    {
        $indent = str_repeat(' ', 16);
        $return = <<<RETURN
{$indent}[
{$indent}    'attribute' => '$attribute',
{$indent}    'value' => function (\$model) {
{$indent}        return Date::show(\$model->$attribute);
{$indent}    },
{$indent}]
RETURN;

        return $return;
    }

    /**
     * 根据controller获取app名称
     * @param $namespace
     * @return bool|string
     */
    public static function getAppName($namespace)
    {
        static $appName = '';

        if (empty($appName))
            $appName = substr($namespace, 0, strpos($namespace, '\\'));

        return $appName;
    }

    /**
     * 处理字段包含is_关键字
     * @param $attribute
     * @return string
     */
    public static function handleIsKeyWord($attribute)
    {
        $indent = str_repeat(' ', 16);
        $return = <<<RETURN
{$indent}[
{$indent}    'attribute' => '$attribute',
{$indent}    'value' => function (\$model) {
{$indent}        if (\$model->$attribute) return '是';
{$indent}        else return '否';
{$indent}    },
{$indent}]
RETURN;

        return $return;
    }
}
