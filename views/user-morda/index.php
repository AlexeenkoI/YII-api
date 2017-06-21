<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserMordaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Подписки на Спикеров';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-morda-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Подписать пользователя на спикера', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Назад', ['site/index'], ['class' => 'btn btn-danger']) ?>
    </p>
    <?= GridView::widget([
        'summary'=>'Подпиcанных {count} - Страниц {page}',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'userid',
            'mordaid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
