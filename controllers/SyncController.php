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
        $data = Group::find()->all();

        return $this->asJson($data);
    }

    public function actionGetRoute() {
        $data = Route::find()->all();

        return $this->asJson($data);
    }

    public function actionGetUser() {
        $batch = Currbatch::find()->one();

        $data = User::find()->where(["batchid" => $batch->currbatch])->all();

        return $this->asJson($batch);
    }

    public function actionGetMoney() {
        $batch = Currbatch::find()->one();

        $data = Moneylog::find()->leftJoin("user", "user.id = moneylog.userid")->where(["batchid" => $batch->currbatch])->all();

        return $this->asJson($batch);
    }



    public function actionGetMorda() {
        $batch = Currbatch::find()->one();

        $data = Morda::find()->where(["batchid" => $batch->currbatch])->all();

        return $this->asJson($batch);
    }
    
}