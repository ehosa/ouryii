<?php

namespace api\modules\v1\controllers;

use Yii;
use api\modules\v1\controllers\ApiController;

use api\modules\v1\models\Appone;

/**
 * 	Appone Controller
 *
 */
class ApponeController extends ApiController {

    public $modelClass = 'api\modules\v1\models\Appone';

    public function actions() {
        $actions = parent::actions();
        unset($actions['create']);
        return $actions;
    }

    public function actionIndex() {
        
    }

    public function actionCreate() {
        $model = new \frontend\models\SignupForm();
        $params = Yii::$app->request->post();
        $model->username = $params['username'];
        $model->password = $params['password'];
        $model->email = $params['email'];
        $model->phone = $params['phone'];

        if ($model->signup()) {
            $response['isSuccess'] = 201;
            $response['message'] = 'You are now a member!';
//            $response['user'] = \common\models\User::findByUsername($model->username);
            $response['user'] = \api\modules\v1\models\Appone::findByUsername($model->username);
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
        $model = new \common\models\LoginForm();
        $params = Yii::$app->request->post();
//        $params = Yii::$app->request->post();
        $model->username = $params['username'];
        $model->password = $params['password'];
        if ($model->login()) {
            $response['message'] = 'You are now logged in!';
//            $response['user'] = \common\models\User::findByUsername($model->username);
            $response['user'] = \api\modules\v1\models\Appone::findByUsername($model->username);
            //return [$response,$model];  
            return $response;
        } else {
            $model->validate();
            $response['errors'] = $model->getErrors();
            return $response;
        }
    }

    public function actionHello() {
//        Yii::$app->user->identityClass = '\api\modules\v1\models\Appone';
        $response = [
            'username' => Yii::$app->user->identity->username,
            'access_token' => Yii::$app->user->identity->getAuthKey()
        ];
        return $response;
    }

}
