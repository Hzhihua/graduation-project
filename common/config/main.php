<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'zh-CN',
    'charset' => 'utf-8',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
            'translations' => [
                'common*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'common' => 'main.php',
                    ],
                ],
                'backend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@backend/messages',
                    'fileMap' => [
                        'backend' => 'main.php',
                    ],
                ],
                'frontend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@frontend/messages',
                    'fileMap' => [
                        'frontend' => 'main.php',
                    ],
                ],

                'traits*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@vendor/cinghie/yii2-traits/messages',
                    'fileMap' => [
                        'traits' => 'traits.php',
                    ],
                ],

                // https://packagist.org/packages/yii2mod/yii2-comments
                'yii2mod.comments' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                ],

            ],
        ],
        //components数组中加入authManager组件,有PhpManager和DbManager两种方式,
        //PhpManager将权限关系保存在文件里,这里使用的是DbManager方式,将权限关系保存在数据库.
        'authManager' => [
            'class' => 'yii\rbac\DbManager', //这里记得用单引号而不是双引号
//            'defaultRoles' => ['guest'],
        ],
    ],
];
