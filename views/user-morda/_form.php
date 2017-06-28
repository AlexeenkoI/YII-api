<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\UserMorda */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-morda-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'userid')->dropDownList(ArrayHelper::map(app\models\User::find()->all(), 'id', 'firstname')) ?>

    <?= $form->field($model, 'mordaid')->dropDownList(ArrayHelper::map(app\models\Morda::find()->all(), 'id', 'fio')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Назад', ['user-morda/index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
