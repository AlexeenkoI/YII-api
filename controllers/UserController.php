<?php

namespace app\controllers;

use Yii;
use app\models\app\models\Moneylog;
use app\models\User;
use app\models\UserSearch;
use app\models\UserMorda;
use app\models\UserMordaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\BaseJson;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'Adduser'=>['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->rfcid == "0")
            $model->rfcid = NULL;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
    public function actionGetall() {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $result = $dataProvider->getModels();
        return $this->asJson($result);
	}
	
    public function beforeDelete(){
        foreach($this->Moneylog as $model){
            $model->delete();
        }

    }
	
	public function actionAdduser() {
        $data = Yii::$app->getRequest()->getBodyParams();
            $user = new User();
            if($user->load($data)){
                $user->save();
			    Yii::$app->response->statusCode = 200;
		    }else{
			    Yii::$app->response->statusCode = 300;
		    }
        //$b = \app\models\Batch::find(["id" => 1])->users->all();

	}
	
	public function actionUpdateuser(){
        $data = Yii::$app->getRequest()->getBodyParams();
        $user = User::find()->where(['id'=>$data["User"]["id"]])->one();
		if($user){
            $user->load($data);
            $user->save();
			Yii::$app->response->statusCode = 200;
		}else{
			Yii::$app->response->statusCode = 300;
		}
	}

    public function actionCrouteusers(){
        $data = Yii::$app->getRequest()->getBodyParams();
        $users = User::find()->where(['batchid'=>$data["routeid"]])->all();
        return $this->asJson($users);
    }

    public function actionGetusersforspeaker(){
        $data = Yii::$app->getRequest()->getBodyParams();
        $curr = User::find()->joinWith('userMordas')->where(["mordaid"=>$data["speakerid"]])->all();
        return $this->asJson($curr);
    }

    public function actionGetusermoneylog(){
        $data = Yii::$app->getRequest()->getBodyParams();
        $logs = \app\models\Moneylog::find()->where(['userid'=>$data['userid']])->all();
        return $this->asJson($logs);
    }

    public function actionGetuserroutes(){
         $data = Yii::$app->getRequest()->getBodyParams();
         $curr = User::find()->joinWith('route')->where(["name"=>$data["name"]])->all();
         return $this->asJson($curr);
    }

    public function actionGetcurrentusermaxscore(){
        $data = Yii::$app->getRequest()->getBodyParams();
        $logs = \app\models\Moneylog::find()->where(['userid'=>$data['userid']])->all();
        $totalscore = 0;
        foreach($logs as $curr){
            if($curr->getAttribute("type")===0){
                $totalscore+=$curr->getAttribute("money");
            }else if($curr->getAttribute("type")===1){
                $totalscore-=$curr->getAttribute("money");
            }
        }
        return $this->asJson($totalscore);
    }

    public function actionGetgroupmaxscore(){
        $data = Yii::$app->getRequest()->getBodyParams();
        $result = \app\models\Moneylog::find()->joinWith('user')->joinWith('group')->where(["name"=>$data["name"]])->all();
        $totalscore = 0;
        foreach($result as $curr){
            if($curr->getAttribute("type")===0){
                $totalscore+=$curr->getAttribute("money");
            }else if($curr->getAttribute("type")===1){
                $totalscore-=$curr->getAttribute("money");
            }
        }
        return $this->asJson($totalscore);
    }

    public function actionGetindividualdata(){
        //$data = User::find()->leftJoin('group','group.id=user.id')->leftJoin('moneylog','moneylog.id=user.id')->where(["type"=>"1"])->all();
        $user = User::find()->all();
        $data = \app\models\Moneylog::find()->leftJoin('user','user.id=moneylog.id')->where(['type'=>'1'])->all();

        return $this->asJson($data);
    }

}
/* {
	"User":
    	{
    		"id":4,
    		"firstname": "UPDATEME",
        	"lastname": "updatelasttest3",
        	"patronymic": "updatepatrotest3",
        	"rfcid": "7e-6c-2b666",
        	"iscap": 0,
        	"isdeleted": 0
    	}
}*/ 