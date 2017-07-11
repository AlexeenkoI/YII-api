<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MoneylogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Денежные логи';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<div class="moneylog-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать лог', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Назад', ['site/index'], ['class' => 'btn btn-danger']) ?>
    </p>
        <?php 
echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
            'id',
            [
                'attribute' => 'userName',
                // 'value' => 'user.firstname',
                'value' => function($model){
                    return $model->user->lastname.' '.$model->user->firstname.' '.$model->user->patronymic;
                }
            ],
            'money',
            'type',
            'description',
            // 'isdeleted',
             'date',

    ]
]);
    ?>       
    <?= \kartik\grid\GridView::widget([
        'summary'=>'Логов {count} - Страница {page}',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                'attribute' => 'userName',
                // 'value' => 'user.firstname',
                'value' => function($model){
                    return $model->user->lastname.' '.$model->user->firstname.' '.$model->user->patronymic;
                }
            ],
            'money',
            'type',
            'description',
            // 'isdeleted',
             'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
