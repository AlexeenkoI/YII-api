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
<script src="/app/datetimepicker-master/jquery.datetimepicker.js"></script>
<!--<script>
$(document).ready(function(){
$('#datetimepicker').click(function(){
    
    alert("123")});
$('#datetimepicker').datetimepicker({
  format:'d.m.Y H:i',
  inline:true,
  lang:'ru',
});
})

</script>-->
<!--<input type="text" id="datetimepicker"/>-->
<input type="text" id="datetimepicker"/>
<script>

$('#datetimepicker').datetimepicker({
    format:'d.m.Y H:i',
    inline:true,
    lang:'ru',

});
$.datetimepicker.setDateFormatter({
    parseDate: function (date, format) {
        var d = moment(date, format);
        return d.isValid() ? d.toDate() : false;
    },
    formatDate: function (date, format) {
        return moment(date).format(format);
    },
});
</script>
<div class="moneylog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'userid')->textInput() ?>

    <?= $form->field($model, 'money')->textInput() ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isdeleted')->checkbox() ?>

    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Enterdate'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'mm/dd/yyyy, D'
    ]
]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Назад', ['moneylog/index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
