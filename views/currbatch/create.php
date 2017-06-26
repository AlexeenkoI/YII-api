<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Currbatch */

$this->title = 'Выбрать заезд';
//$this->params['breadcrumbs'][] = ['label' => 'Currbatches', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="currbatch-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
