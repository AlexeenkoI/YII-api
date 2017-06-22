<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Grouppriority */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grouppriority-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'groupid')->textInput() ?>

    <?= $form->field($model, 'batchid')->dropDownList($model,[]) ?>

    <?= $form->field($model, 'p1')->textInput() ?>

    <?= $form->field($model, 'p2')->textInput() ?>

    <?= $form->field($model, 'p3')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
         <?= Html::a('Назад', ['grouppriority/index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
