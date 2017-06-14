<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
     * Выбрасывает на экран всех пользователей
     * @return mixed
     */
    public function actionIndexJson()
    {
        $searchModel = User::find();
        $this->asJson($searchModel->all());
    }

    /**
     * Выбрасывает на экран всех пользователей
     * по id прибытия
     * @return mixed
     */
    public function actionIndexByBatchJson($id)
    {
        $searchModel = User::find();
        $searchModel->andWhere(["batchid" => $id]);
        $this->asJson($searchModel->all());
    }
    

    /**
     * Выбрасывает на экран всех пользователей
     * по id прибытия
     * @return mixed
     */
    public function actionIndexByBatchNameJson($name)
    {
        $searchModel = \app\models\Batch::find(['name' => $name])->one();
        $this->asJson($searchModel->users->all());
    }


    /**
     * Выбрасывает на экран всех пользователей
     * по id прибытия
     * @return mixed
     */
    public function UpdateJson($id, $data)
    {
        $searchModel = User::find(['id' => $id])->one();
        $searchModel->load($data);
        if ($searchModel->save()) {
            $this->asJson(1);
        } else {
            $this->asJson(0);
        }
        
    }

    /**
     * Выбрасывает на экран всех пользователей
     * по id прибытия
     * @return mixed
     */
    public function CreateJson($data)
    {
        $searchModel = new User();
        $searchModel->load($data);
        if ($searchModel->save()) {
            $this->asJson(1);
        } else {
            $this->asJson(0);
        }
        
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
}
