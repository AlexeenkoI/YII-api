<?php 

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;

use app\models\Shop;
use app\models\Event;
use app\models\Morda;
use app\models\Currbatch;
use app\models\Group;
use app\models\Route;
use app\models\User;
use app\models\Moneylog;
use app\models\Grouppriority;
use app\models\UserMorda;

class SyncController extends Controller {

    public function actionGetShop() {
        $data = Shop::find()->where(["isdeleted" => "0"])->all();

        return $this->asJson($data);
    }

    public function actionGetEvents() {
        $data = Event::find()->where(["isdeleted" => "0"])->all();

        return $this->asJson($data);
    }

    public function actionGetGroup() {
        $data = Group::find()->andWhere(["isdeleted" => "0"])->all();

        return $this->asJson($data);
    }

    public function actionGetRoute() {
        $data = Route::find()->andWhere(["isdeleted" => "0"])->all();

        return $this->asJson($data);
    }

    public function actionGetUser() {
        $batch = Currbatch::find()->one();

        $data = User::find()->where(["batchid" => $batch->currentbatch])->andWhere(["isdeleted" => "0"])->all();

        return $this->asJson($data);
    }

    public function actionGetMoney() {
        $batch = Currbatch::find()->one();

        $data = Moneylog::find()->leftJoin("user", "user.id = moneylog.userid")->where(["batchid" => $batch->currentbatch])->andWhere(["moneylog.isdeleted" => "0"])->all();

        return $this->asJson($data);
    }

    public function actionGetMorda() {
        $batch = Currbatch::find()->one();

        $data = Morda::find()->where(["batchid" => $batch->currentbatch])->andWhere(["isdeleted" => "0"])->all();

        return $this->asJson($data);
    }

    public function actionGetPriority()
    {
        $batch = Currbatch::find()->one();

        $data = Grouppriority::find()->where(["batchid" => $batch->currentbatch])->all();

        return $this->asJson($data);
    }

    public function actionGetUserMorda() {
        $batch = Currbatch::find()->one();

        $data = UserMorda::find()->leftJoin("user", "user.id = user_morda.userid")->where(["batchid" => $batch->currentbatch])->all();

        return $this->asJson($data);
    }

    public function actionSetUser() {
        $batch = Currbatch::find()->one();

        var_dump(User::findOne(["id" => Yii::$app->request->post("id")]));
        

        // $user = new User();
        // $user->setAttributes(Yii::$app->request->post());

        // $user->batchid = $batch->currentbatch;

        
    }

    
}