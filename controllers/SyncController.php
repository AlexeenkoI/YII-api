<?php 

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;

use app\models\Shop;


class SyncController extends Controller {

    public function actionGetShop() {
        $data = Shop::find()->all();

        return $this->asJson($data);
    }

    public function actionGetEvents() {
        
    }
}