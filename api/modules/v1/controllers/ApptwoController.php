<?php

namespace api\modules\v1\controllers;

use Yii;
use api\modules\v1\controllers\ApiController;

/**
 * 	Userappone Controller
 *
 */
class ApptwoController extends ApiController {

    public $modelClass = 'api\modules\v1\models\Apptwo';

    public function actions() {
        $actions = parent::actions();
        unset($actions['create']);
        return $actions;
    }

    public function actionIndex() {
        
    }

    public function actionCreate() {
        $model = new \frontend\models\SignupFormTwo();
        $params = Yii::$app->request->post();
        $model->username = $params['username'];
        $model->password = $params['password'];
        $model->email = $params['email'];
        $model->phone = $params['phone'];

        if ($model->signup()) {
            $response['isSuccess'] = 201;
            $response['message'] = 'You are now a member of AppTwo!';
//            $response['user'] = \common\models\User::findByUsername($model->username);
            $response['user'] = \api\modules\v1\models\Apptwo::findByUsername($model->username);
            return $response;
        } else {
            //$model->validate();
            $model->getErrors();
            $response['hasErrors'] = $model->hasErrors();
            $response['errors'] = $model->getErrors();
            //return = $model;
            return $response;
        }
    }

    public function actionLogin() {
        $model = new \common\models\LoginFormTwo();
        $params = Yii::$app->request->post();
//        $params = Yii::$app->request->post();
        $model->username = $params['username'];
        $model->password = $params['password'];
        if ($model->login()) {
            $response['message'] = 'You are now logged in AppTwo!';
//            $response['user'] = \common\models\User::findByUsername($model->username);
            $response['user'] = \api\modules\v1\models\Apptwo::findByUsername($model->username);
            //return [$response,$model];  
            return $response;
        } else {
            $model->validate();
            $response['errors'] = $model->getErrors();
            return $response;
        }
    }

    public function actionHello() {
        $response = [
            'username' => Yii::$app->userapptwo->identity->username,
            'access_token' => Yii::$app->userapptwo->identity->getAuthKey(),
//            'access_token' => Yii::$app->user->identity->getAuthKey()
        ];
        return $response;
    }

}
