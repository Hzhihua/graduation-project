<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'defaultRoute' => 'article',
    'bootstrap' => [
        'log',
        'admin'
    ],
    'modules' => [
        'admin' => [ // https://github.com/mdmsoft/yii2-admin
            'class' => 'mdm\admin\Module',
        ],
        'user' => [ // https://github.com/dektrium/yii2-user
            'class' => 'dektrium\user\Module',
            'defaultRoute' => 'admin/index',
            // 'admins' => ['root'], // array An array of administrator's usernames
            'adminPermission' => 'admin', // string The Administrator permission name
        ],
        'comment' => [ // https://packagist.org/packages/yii2mod/yii2-comments
            'class' => 'yii2mod\comments\Module',
        ],
        'rbac' => 'dektrium\rbac\RbacWebModule',

        // must for article
        'gridview' =>  [
            'class' => 'kartik\grid\Module'
        ],
        'markdown' => [
            'class' => 'kartik\markdown\Module',
        ],
        'article' => [
            'class' => 'hzhihua\articles\Module',
            'editor' => 'ckeditor',
            'editorDataHandle' => 'hzhihua\articles\Ckeditor',
//            'editorViewFile' => '@backend/views/article/_ckeditor.php',
        ],
    ],
    'aliases' => [
        '@mdm/admin' => '@vendor/mdmsoft/yii2-admin',
    ],
    'language' => 'zh-CN',
    'charset' => 'utf-8',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'dektrium\user\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['/user/security/login'],
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
//            'traceLevel' => YII_DEBUG ? 3 : 0,
            'traceLevel' => 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'assetManager' => [
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => 'skin-blue',
                ],
                'mdm\admin\AutocompleteAsset' => [
                    'sourcePath' => '@backend/assets/source/mdm-admin-autocompleteAsset'
                ],
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@vendor/yii2mod/yii2-comments/views/manage' => '@backend/views/comment-manage', // comment module
                    '@vendor/mdmsoft/yii2-admin/views/menu' => '@backend/views/admin-menu', // admin module
//                    '@vendor/dektrium/yii2-user/views/security' => '@backend/views/user-security',
                ],
            ],
        ],
        'urlManager' => [    
            //用于表明urlManager是否启用URL美化功能，在Yii1.1中称为path格式URL，    
            // Yii2.0中改称美化。   
            // 默认不启用。但实际使用中，特别是产品环境，一般都会启用。   
            'enablePrettyUrl' => true,
            // 是否启用严格解析，如启用严格解析，要求当前请求应至少匹配1个路由规则，    
            // 否则认为是无效路由。    
            // 这个选项仅在 enablePrettyUrl 启用后才有效。    
            'enableStrictParsing' => false,    
            // 是否在URL中显示入口脚本。是对美化功能的进一步补充。    
            'showScriptName' => false,    
            // 指定续接在URL后面的一个后缀，如 .html 之类的。仅在 enablePrettyUrl 启用时有效。    
            'suffix' => '',
            'rules' => [
                'admin/' => 'admin/default/index',
//                '<controller:[\w\-]+>/'=>'<controller>/index',
                '<controller:[\w\-]+>/<action:[\w\-]+>'=>'<controller>/<action>',
                '<module:[\w\-]+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/<controller>/<action>',
            ],
        ],
        
    ],
    'params' => $params,
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            //这里是允许访问的action
            //controller/action
//            '*',
//            'site/captcha',
            'user/security/logout',
            'user/security/login',
        ]
    ],
];
