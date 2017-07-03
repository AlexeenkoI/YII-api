<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Grouppriority */

$this->title = 'Создать приоритет';
//$this->params['breadcrumbs'][] = ['label' => 'Grouppriorities', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<div class="grouppriority-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
