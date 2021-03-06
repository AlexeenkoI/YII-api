<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GroupprioritySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Grouppriorities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grouppriority-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Grouppriority', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'groupid',
            'batchid',
            'p1',
            'p2',
            // 'p3',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
