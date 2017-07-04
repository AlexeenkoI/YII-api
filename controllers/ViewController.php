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



    public function actionUser() {
        $this->asJson(Yii::$app->db->createCommand("select CONCAT(lastname, ' ' ,SUBSTR(firstname, 1, 1), '.', SUBSTR(patronymic, 1, 1), '.') as name , 
                                                            IF(ISNULL(money), 0, money) as score from user
                                                    left join (
                                                        select userid as uid, sum(money) as money from moneylog where moneylog.type = 'ADD_MONEY' group by moneylog.userid
                                                        ) as t on user.id = t.uid
                                                        order by score desc")->queryAll());
    }

    public function actionKubik() {
        $this->asJson(Yii::$app->db->createCommand("select 
                                                    `group`.name,
                                                    IF(ISNULL(p1), 0, p1) as p1,
                                                    IF(ISNULL(p2), 0, p2) as p2,
                                                    IF(ISNULL(p3), 0, p3) as p3
                                                    from `group`
                                                    left join (select * from grouppriority where batchid = (select currentbatch from currbatch limit 1)) as t on `group`.id = t.groupid
                                                    order by (p1 + p2 + p3) desc")->queryAll());
    }

}