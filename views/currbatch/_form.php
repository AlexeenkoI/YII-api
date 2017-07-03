<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Currbatch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="container">
<div class="currbatch-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=$form->field($model, 'currentbatch')->dropDownList(ArrayHelper::map(app\models\Batch::find()->all(), 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Выбрать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a("Назад", ['currbatch/index'], ['class'=>'btn btn-danger'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>