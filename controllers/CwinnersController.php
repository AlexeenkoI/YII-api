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

    public function actionAjaxwinners(){
        // todo data dor ajaxrequest from cwinners view
    }

}
