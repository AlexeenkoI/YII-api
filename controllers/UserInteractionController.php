<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

var_dump("123123") exit();
class UserInteractionController extends \yii\web\Controller
{
    public function actionGetAll()
    {
		$searchModel = new UserSearch();
		$result = $searchModel->UserToJson();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		//$content =['Data'=>$dataProvider];
		//$response = Yii::$app->response;
		//$response->format = \yii\web\Response::FORMAT_JSON;
		//$response->statusCode = 200;
		//$response->data = $content;
	
        return $result;
    }
	
	public function actionUpdateUser()
	{
		$post = file_get_contents("php://input");
		$data = CJSON::decode($post, true);
		$response = Yii::$app->response;
		$usr = new User();
		$result = $usr->updateUserFromJson($data);
		if($result){
			$response->statusCode = 200;
			return $response;
		}else{
			$response->statusCode = 300;
			return $response;
		}
	}
	
	public function actionAddUser()
	{
		$post = file_get_contents("php://input");
		$data = CJSON::decode($post, true);
		$response = Yii::$app->response;
		$usr = new User();
		$res = $usr->addUserFromJson($data);
		if($res){
			$response->statusCode=200;
		}else{
			$response->statusCode=300;
		}
		
	}
}
