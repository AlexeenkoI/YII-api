<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
// use kartik\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Moneylog */
/* @var $form yii\widgets\ActiveForm */
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="/app/datetimepicker-master/jquery.datetimepicker.css"/>
<script src="/app/datetimepicker-master/jquery.js"></script>
<script src="/app/datetimepicker-master/build/jquery.datetimepicker.full.min.js"></script>

<input type="text" id="datetimepicker"/>

<div class="moneylog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'userid')->textInput() ?>

    <?= $form->field($model, 'money')->textInput() ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isdeleted')->checkbox() ?>

    <?= $form->field($model, 'date')->textInput(['value'=>'Выберите дату']) ?>

<script>
$('#moneylog-date').datetimepicker({
});
</script>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Назад', ['moneylog/index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
