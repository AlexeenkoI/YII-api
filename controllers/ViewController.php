<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class ViewController  extends Controller {

    public function actionIndex() {
        // $this->asJson(Yii::$app->db->createCommand("select 
        //                                                 t1.name as `group`,
        //                                                 IF(ISNULL(t2.p1), 0, t2.p1 + t2.p2 + t2.p3)  as `score`
        //                                             from (
        //                                                 select * from `group`
        //                                                 where `group`.vip = 0
        //                                             ) as t1 
        //                                                 left join (
        //                                                     select * from `grouppriority` 
        //                                                     where grouppriority.batchid = (select currentbatch from currbatch limit 1)
        //                                                     group by groupid) as t2
        //                                                 on t1.id = t2.groupid
        //                                             order by t2.p1 + t2.p2 + t2.p3 desc, t2.p4 desc
        //                                             limit 20")->queryAll());

        $this->asJson(Yii::$app->db->createCommand("select 
                                                        t1.name as `group`,
                                                        IF(ISNULL(t2.money), 0 , t2.money) as `score`
                                                    from (
                                                        SELECT * FROM `group` where vip = 0
                                                    ) as t1
                                                        left join (
                                                            select 
                                                                groupid,
                                                                sum(money) as money
                                                            from (
                                                                select 
                                                                    `user`.groupid,
                                                                    sum(moneylog.money) as money
                                                                from `user` 
                                                                right join moneylog on moneylog.userid = `user`.id
                                                                where moneylog.type = 'ADD_MONEY'
                                                                and `user`.groupid is not null
                                                                group by `user`.id
                                                            ) as b group by groupid
                                                        ) as t2 on t1.id = t2.groupid
                                                    order by t2.money desc
                                                    limit 20;")->queryAll());                                                    
    }



    public function actionUser() {
        $this->asJson(Yii::$app->db->createCommand("select CONCAT(lastname, ' ' ,SUBSTR(firstname, 1, 1), '.', SUBSTR(patronymic, 1, 1), '.') as name , 
                                                            IF(ISNULL(money), 0, money) as score from user
                                                    left join (
                                                        select userid as uid, sum(money) as money from moneylog where moneylog.type = 'ADD_MONEY' group by moneylog.userid
                                                        ) as t on user.id = t.uid
                                                        order by score desc
                                                        limit 20")->queryAll());
    }

    public function actionUserm() {
        $this->asJson(Yii::$app->db->createCommand("select CONCAT(lastname, ' ' ,SUBSTR(firstname, 1, 1), '.', SUBSTR(patronymic, 1, 1), '.') as name , 
                                                            IF(ISNULL(money), 0, money) as score from user
                                                    left join (
                                                        select userid as uid, sum(money) as money from moneylog where moneylog.type = 'ADD_MONEY' group by moneylog.userid
                                                        ) as t on user.id = t.uid
                                                        where sex = 'M'
                                                        order by score desc
                                                        limit 20")->queryAll());
    }
    public function actionUserf() {
        $this->asJson(Yii::$app->db->createCommand("select CONCAT(lastname, ' ' ,SUBSTR(firstname, 1, 1), '.', SUBSTR(patronymic, 1, 1), '.') as name , 
                                                            IF(ISNULL(money), 0, money) as score from user
                                                    left join (
                                                        select userid as uid, sum(money) as money from moneylog where moneylog.type = 'ADD_MONEY' group by moneylog.userid
                                                        ) as t on user.id = t.uid
                                                        where sex = 'F'
                                                        order by score desc
                                                        limit 10")->queryAll());
    }

    public function actionKubik() {
        // $this->asJson(Yii::$app->db->createCommand("select 
        //                                             `group`.name,
        //                                             IF(ISNULL(p1), 0, p1) as p1,
        //                                             IF(ISNULL(p2), 0, p2) as p2,
        //                                             IF(ISNULL(p3), 0, p3) as p3
        //                                             from `group`
        //                                             left join (select * from grouppriority where batchid = (select currentbatch from currbatch limit 1)) as t on `group`.id = t.groupid
        //                                             where `group`.vip = 0
        //                                             order by (p1 + p2 + p3) desc")->queryAll());

        $this->asJson(Yii::$app->db->createCommand("select 

                                                        t1.name,
                                                        IF(ISNULL(t2.p1), 0, t2.p1) as p1,
                                                        IF(ISNULL(t2.p2), 0, t2.p2) as p2,
                                                        IF(ISNULL(t2.p3), 0, t2.p3) as p3

                                                    from (
                                                        select 
                                                            *
                                                        from `group`
                                                        where `group`.vip = 0
                                                    ) as t1

                                                    left join (
                                                        select 
                                                            * 
                                                        from grouppriority 
                                                        where batchid = (select currentbatch from currbatch limit 1)
                                                        group by grouppriority.groupid
                                                    ) as t2 on t1.id = t2.groupid

                                                    order by (t2.p1 + t2.p2 + t2.p3) desc, t2.p4 desc")->queryAll());                                                    
    }

    public function actionGetajaxroute() {
        $this->asJson(Yii::$app->db->createCommand("select 
                                                        t1.name as name,
                                                        t1.capacity - IF(ISNULL(t2.cid), 0, t2.cid) as capacity
                                                    from (
                                                        select * from route 
                                                        where route.isvip = 0
                                                        ) as t1
                                                    left join (
                                                        select routeid, COUNT(id) as cid 
                                                        from user 
                                                        where user.batchid = (select currentbatch from currbatch limit 1) 
                                                        group by routeid) as t2 on t1.id = t2.routeid")->queryAll());
                                                        }

}