<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Morda */

$this->title = 'Создать Спикера';
//$this->params['breadcrumbs'][] = ['label' => 'Mordas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="morda-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
