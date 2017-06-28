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

        $user = User::findOne(["id" => Yii::$app->request->post("id")]);

        if ($user == NULL) {
            $user = new User();
        }
        
        $user->setAttributes(Yii::$app->request->post());

        $user->batchid = $batch->currentbatch;

        if ($user->groupid == -1) $user->groupid = NULL;
        if ($user->routeid == -1) $user->routeid = NULL;

        $user->save();

        return $this->asJson($user->id);
    }

    public function actionSetPriority() {
        $batch = Currbatch::find()->one();

        $priority = Grouppriority::findOne(["id" => Yii::$app->request->post("id")]);

        if ($priority == NULL) {
            $priority = new Grouppriority();
        }
        
        $priority->setAttributes(Yii::$app->request->post());

        $priority->batchid = $batch->currentbatch;

        if ($priority->p1 == -1) $priority->p1 = 0;
        if ($priority->p2 == -1) $priority->p2 = 0;
        if ($priority->p3 == -1) $priority->p3 = 0;
        if ($priority->p4 == -1) $priority->p4 = 0;

        $priority->save();

        return $this->asJson($priority->id);
    }


    public function actionSetMoney() {
        $batch = Currbatch::find()->one();

        $money = Moneylog::findOne(["id" => Yii::$app->request->post("id")]);

        if ($money == NULL) {
            $money = new Moneylog();
        }
        
        $money->setAttributes(Yii::$app->request->post());

        $money->save();

        return $this->asJson($money->id);
    }

    public function actionSetUserMorda() {
        $batch = Currbatch::find()->one();

        $morda = UserMorda::findOne(["id" => Yii::$app->request->post("id")]);

        if ($morda == NULL) {
            $morda = new UserMorda();
        }
        
        $morda->setAttributes(Yii::$app->request->post());

        $morda->save();

        return $this->asJson($morda->id);
    }

    
}