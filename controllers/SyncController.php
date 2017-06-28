<?php 

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;

use app\models\Shop;
use app\models\Event;
use app\models\Morda;
use app\models\Currbatch;


class SyncController extends Controller {

    public function actionGetShop() {
        $data = Shop::find()->where(["isdeleted" => "0"])->all();

        return $this->asJson($data);
    }

    public function actionGetEvents() {
        $data = Event::find()->where(["isdeleted" => "0"])->all();

        return $this->asJson($data);
    }

    public function actionGetMorda() {
        $batch = Currbatch::find()->one();

        $data = Morda::find()->where(["batchid" => $batch->id])->all();

        return $this->asJson($batch);
    }
    
}