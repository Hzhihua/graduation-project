<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    // add class autoload
    Yii::$classMap['common\gii\model\Generator'] = '@common/gii/model/Generator.php';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [ // 这里配置生成器
            'model' => [ // 生成器名称
                'class' => 'common\gii\model\Generator', // 生成器类
                'templates' => [ // 配置模版文件
                    'myModel' => '@common/gii/model/default', // 模版名称 => 模版路径
                ]
            ],
            'crud' => [
                'class' => 'yii\gii\generators\crud\Generator',
                'templates' => [
                    'adminlte' => '@backend/gii/crud/simple',
                ]
            ],
        ],
    ];
}

return $config;
