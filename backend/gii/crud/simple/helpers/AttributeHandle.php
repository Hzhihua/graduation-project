<?php
/**
 * @Author: Hzhihua
 * @Time: 2018/1/29 12:18
 * @Github: https://github.com/Hzhihua
 */

class AttributeHandle
{
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
}
