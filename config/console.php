<?php
Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

$params = require(__DIR__ . '/params.php');
$db = file_exists(__DIR__ . '/db.php') ? require(__DIR__ . '/db.php') : [ 'class' => 'yii\db\Connection' ];

return [
    'name' => 'stat.ink',
    'version' => require(__DIR__ . '/version.php'),
    'id' => 'statink-console',
    'timeZone' => 'Asia/Tokyo',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'gii'],
    'controllerNamespace' => 'app\commands',
    'modules' => [
        'gii' => 'yii\gii\Module',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'schemaCache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@runtime/schema-cache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
    ],
    'params' => $params,
];
