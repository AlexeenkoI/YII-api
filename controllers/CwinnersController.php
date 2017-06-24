<?php

namespace app\controllers;

class CwinnersController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAjaxwinners(){
        // todo data dor ajaxrequest from cwinners view
    }

}
