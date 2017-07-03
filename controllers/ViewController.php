<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class ViewController  extends Controller {

    public function actionIndex() {
        $this->asJson(Yii::$app->db->createCommand("select 
                                                    `group`.name as `group`,
                                                    IF(ISNULL(p1), 0, p1 + p2 + p3)  as `score`
                                                from `group`
                                                left join grouppriority on grouppriority.groupid = `group`.id and grouppriority.batchid = (select currentbatch from currbatch limit 1)
                                                order by p1 + p2 + p3 desc")->queryAll());
    }

}