<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать Пользователя', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Назад', ['site/index'], ['class' => 'btn btn-danger']) ?>
    </p>
    <?= GridView::widget([
        'summary'=>'Пользователей {count} - Страниц {page}',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

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
