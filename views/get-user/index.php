<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResponseUser */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
        <?php 
echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
            'id',
            'firstname',
            'lastname',
            'patronymic',
            'rfcid',
            // 'groupid',
            // 'batchid',
            // 'routeid',
            // 'iscap',
            // 'isdeleted',

    ]
]);
    ?>         
    <?= \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'firstname',
            'lastname',
            'patronymic',
            'rfcid',
            // 'groupid',
            // 'batchid',
            // 'routeid',
            // 'iscap',
            // 'isdeleted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
