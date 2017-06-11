<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Grouppriority */

$this->title = 'Create Grouppriority';
$this->params['breadcrumbs'][] = ['label' => 'Grouppriorities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grouppriority-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
