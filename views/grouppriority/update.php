<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Grouppriority */

$this->title = 'Обновить приоритет: ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Grouppriorities', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container">
<div class="grouppriority-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>