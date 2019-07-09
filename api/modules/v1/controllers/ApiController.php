<?php
namespace api\modules\v1\controllers;

use yii\filters\auth\QueryParamAuth;
use yii\filters\Cors;
use yii\rest\ActiveController;

/**
 * API Base Controller
 * All controllers within API app must extend this controller
 */
 
 class ApiController extends ActiveController {
 
	// public function behaviors(){
	// 	$behaviors = parent::behaviors();
		
	// 	// add CORS filter
	// 	$behaviors['corsFilter'] = [
	// 		'class' => Cors::className(),
	// 		];
	// 		// Add QueryParamAuth for authentication
	// 		$behaviors['authenticator'] = [
	// 		'class' => QueryParamAuth::className(),
	// 		];
	// 		// avoid authentication on CORS preflight request (HTTP OPTIONS method)
	// 		$behaviors['authenticator']['except'] = ['options'];
			
	// 		return $behaviors;
	// }
 

 }
