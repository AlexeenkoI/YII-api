<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserMorda */

$this->title = 'Create User Morda';
$this->params['breadcrumbs'][] = ['label' => 'User Mordas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-morda-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
