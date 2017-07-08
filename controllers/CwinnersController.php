<?php

namespace app\controllers;

class CwinnersController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionIndividual(){
        return $this->render('individual', ["ANEX" => ""]);
    }
    public function actionIndividualm(){
        return $this->render('individual', ["ANEX" => "m"]);
    }
    public function actionIndividualf(){
        return $this->render('individual', ["ANEX" => "f"]);
    }

    public function actionRoutes(){
        return $this->render('routes');
    }

    public function actionIndividualpos(){
        return $this->render('individualpos', ["ANEX" => ""]);
    }

    public function actionIndividualposm(){
        return $this->render('individualpos', ["ANEX" => "m"]);
    }
    public function actionIndividualposf(){
        return $this->render('individualpos', ["ANEX" => "f"]);
    }

    public function actionTeampos(){
        return $this->render('teampos');
    }

    public function actionKubik() {
        return $this->render('teampos1');
    }

    public function actionAjaxwinners(){
        // todo data dor ajaxrequest from cwinners view
    }

}
