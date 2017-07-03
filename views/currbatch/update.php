<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Currbatch */

$this->title = 'Обновить текущий заезд: ' . $model->currentbatch;
//$this->params['breadcrumbs'][] = ['label' => 'Currbatches', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->currentbatch, 'url' => ['view', 'id' => $model->currentbatch]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container">
<div class="currbatch-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>