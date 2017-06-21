<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MoneylogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Денежные логи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="moneylog-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать Лог', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a("Назад", ['site/index'], ['class'=>'btn btn-danger'])?>
    </p>
    <?= GridView::widget([
        'summary'=>'Записей {count} - Страниц {page}',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'userid',
            'money',
            'type',
            'description',
            // 'isdeleted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
