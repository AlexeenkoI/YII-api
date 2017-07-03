<?php

namespace app\controllers;

class CwinnersController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionIndividual(){
        return $this->render('individual');
    }

    public function actionRoutes(){
        return $this->render('routes');
    }

    public function actionIndividualpos(){
        return $this->render('individualpos');
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
