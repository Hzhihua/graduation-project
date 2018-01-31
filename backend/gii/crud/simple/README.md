## Gii模板使用注意事项
1. 创建时间字段名需为 **created_at**
2. 修改时间字段名需为 **updated_at**
3. 字段名称包含**time**关键字且为**integer**类型的，其值交由\backend\helpers\Date::show()方法处理
4. 字段名称包含**is_**关键字，自动生成下拉列表
5. 创建helpers 目录 [参考](https://github.com/Hzhihua/graduation-project/tree/master/backend/helpers)
6. 创建widgets 目录 [参考](https://github.com/Hzhihua/graduation-project/tree/master/backend/widgets)
7. 创建grid 目录 [参考](https://github.com/Hzhihua/graduation-project/tree/master/backend/grid)
8. 指定的Model Class需包含 **insert** **update** 场景 [参考](https://github.com/Hzhihua/graduation-project/tree/master/common/models)

## 使用
```ssh
cd @backend # 切换到后台目录
svn checkout https://github.com/Hzhihua/graduation-project/tree/master/backend/gii
svn checkout https://github.com/Hzhihua/graduation-project/tree/master/backend/helpers
```

> 配置backend/main-local.php
```php
$config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [
            // ...
            'crud' => [
                'class' => 'yii\gii\generators\crud\Generator',
                'templates' => [
                    'adminlte' => '@backend/gii/crud/simple',
                ]
            ],
        ],
    ];
```