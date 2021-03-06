<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
return [
       'modules' => [
        'contact' => [
            'class' => 'app\modules\contact\Module',
        ],
        'pettycash' => [
            'class' => 'app\modules\pettycash\Module',
        ],
        'attendance' => [
            'class' => 'app\modules\attendance\Module',
        ], 
         'payment' => [
            'class' => 'app\modules\payment\Module',
        ],       
    ],
    /*'modules' => [
        'project' => [
            'class' => 'app\modules\project\Module',
        ],
    ],*/
      
  
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
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
        //used to restapi
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,            
            'showScriptName' => false,
            //'enableStrictParsing' => false,
             //'suffix' => '.html',
            'rules' => [               
                'material/get-material/<id:\w+>' => 'material/get-material',
                'material/update-material/<id:\w+>' => 'material/update-material',
                'material/delete-material/<id:\w+>' => 'material/delete-material',
                'material/create-material/<id:\w+>' => 'material/create-material',

                'material-purchased/create-material-purchased/<id:\w+>' => 'material-purchased/create-material-purchased',
                'material-purchased/update-material-purchased/<id:\w+>' => 'material-purchased/update-material-purchased',
                'material-purchased/delete-material-purchased/<id:\w+>' => 'material-purchased/delete-material-purchased',
                'material-purchased/date' => 'material-purchased/date',

                
                'pettycash/petty-cash/get-petty-cash/<id:\w+>' => 'pettycash/petty-cash/get-petty-cash',

                'pettycash/petty-cash-purchase/get-petty-cash-purchase/<id:\w+>' => 'pettycash/petty-cash-purchase/get-petty-cash-purchase',

                'attendance/vehicle-attendance/get-vehicle-attendance/<id:\w+>' =>'attendance/vehicle-attendance',
                'attendance/vehicle-attendance/delete-vehicle-attendance/<id:\w+>' =>'attendance/vehicle-attendance/delete-vehicle-attendance',

                'attendance/labour-attendance/get-labour-attendance/<id:\w+>' =>'attendance/labour-attendance/',


                'payment/vehicle-cost/get-vehicle-cost/<id:\w+>' =>'payment/vehicle-cost',
                'payment/labour-cost/get-labour-cost/<id:\w+>' =>'payment/labour-cost',
                'payment/bank-details/get-bank-details/<id:\w+>' =>'payment/bank-details',
                'payment/bank-details/delete-bank-details/<id:\w+>' =>'payment/bank-details/delete-bank-details',


                'contact/account/update/<id:\w+>' => 'account/update',
                //'contact/account/create/<id:\w+>' => 'contact/account/create',


                'contact/labour/create-labour-contact' => 'contact/labour/create-labour-contact',

                'contact/vehicle/create-vehicle-contact' => 'contact/vehicle/create-vehicle-contact',


                'contact/supplier/get-supplier/<id:\w+>' => 'contact/supplier/get-supplier',
                'account/delete/<id:\w+>' => 'account/delete',


                'project/create/<id:\w+>' => 'project/create',
                'project/update/<id:\w+>' => 'project/update',
                'project/delete/<id:\w+>' => 'project/delete',

                // 'supplier/create/<id:\w+>' => 'supplier/create',
                // 'supplier/update/<id:\w+>' => 'supplier/update',
                // 'supplier/delete/<id:\w+>' => 'supplier/delete',
                ['class' => 'yii\rest\UrlRule', 'controller' => ['material','material-purchased','account','project','supplier','petty-cash']],   
            ],
        ],
        'request' => [
            'parsers' => [
               'application/json' => 'yii\web\JsonParser',
            ]
         ],        
    ],
    'params' => $params,
];
