<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CurrbatchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Текущий заезд';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<div class="currbatch-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!--<?= Html::a('Выбрать текущий заезд', ['create'], ['class' => 'btn btn-success']) ?>-->
        <?= Html::a("Назад", ['site/index'], ['class'=>'btn btn-danger'])?>

    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'currentbatch',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>