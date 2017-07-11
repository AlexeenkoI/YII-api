<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Команды';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<div class="group-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать группу', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Назад', ['site/index'], ['class' => 'btn btn-danger']) ?>
    </p>
        <?php 
echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
            'id',
            'name',
            'description',
            'totemname',
            'totemimage',
            // 'color',
            // 'colorhex',
            // 'isdeleted',

    ]
]);
    ?>       
    <?= \kartik\grid\GridView::widget([
        'summary'=>'Групп {count} - Страниц {page}',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description',
            'totemname',
            'totemimage',
            // 'color',
            // 'colorhex',
            // 'isdeleted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>