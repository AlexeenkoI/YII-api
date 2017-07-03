<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ResponseUser */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="container">
<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'firstname') ?>

    <?= $form->field($model, 'lastname') ?>

    <?= $form->field($model, 'patronymic') ?>

    <?= $form->field($model, 'rfcid') ?>

    <?php // echo $form->field($model, 'groupid') ?>

    <?php // echo $form->field($model, 'batchid') ?>

    <?php // echo $form->field($model, 'routeid') ?>

    <?php // echo $form->field($model, 'iscap') ?>

    <?php // echo $form->field($model, 'isdeleted') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
