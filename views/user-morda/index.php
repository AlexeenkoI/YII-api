<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserMordaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Mordas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-morda-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Morda', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'userid',
            'mordaid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
