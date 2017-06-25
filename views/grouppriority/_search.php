<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GroupprioritySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grouppriority-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'groupid') ?>

    <?= $form->field($model, 'batchid') ?>

    <?= $form->field($model, 'p1') ?>

    <?= $form->field($model, 'p2') ?>

    <?php // echo $form->field($model, 'p3') ?>

    <?php // echo $form->field($model, 'p4') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
