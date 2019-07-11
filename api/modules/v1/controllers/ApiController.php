<?php

namespace api\modules\v1\controllers;

use yii\filters\auth\QueryParamAuth;
use yii\filters\Cors;
use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\ContentNegotiator;
use yii\web\Response;

/**
 * API Base Controller
 * All controllers within API app must extend this controller
 */
class ApiController extends ActiveController {

//     public function behaviors(){
//     	$behaviors = parent::behaviors();
//     	// add CORS filter
//     	$behaviors['corsFilter'] = [
//     		'class' => Cors::className(),
//     		];
//     		// Add QueryParamAuth for authentication
//     		$behaviors['authenticator'] = [
//     		'class' => QueryParamAuth::className(),
//     		];
//     		// avoid authentication on CORS preflight request (HTTP OPTIONS method)
//     		$behaviors['authenticator']['except'] = ['options'];
//     		return $behaviors;
//     }

    public function behaviors() {
        $behaviors = parent::behaviors();

        // remove authentication filter
        $auth = $behaviors['authenticator'];
        unset($behaviors['authenticator']);

        // add CORS filter
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
        ];

        // re-add authentication filter
        $behaviors['authenticator'] = $auth;


//        $behaviors['authenticator'] = [
//            'class' => HttpBasicAuth::className(),
//            'only' => ['hello'],
//        ];

        // avoid authentication on CORS-pre-flight requests (HTTP OPTIONS method)
        $behaviors['authenticator']['except'] = ['options'];

        return $behaviors;
    }

}
