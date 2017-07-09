<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MordaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Спикеры';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<div class="morda-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать спикера', ['create'], ['class' => 'btn btn-success']) ?>
         <?= Html::a('Назад', ['site/index'], ['class' => 'btn btn-danger']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fio',
            'description',
            'pic',
            'batchid',
            // 'isdeleted',
             'capacity',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>