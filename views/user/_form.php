<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
</div class="container">
<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rfcid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'groupid')->dropDownList(ArrayHelper::map(app\models\Group::find()->all(), 'id', 'name'),['options' =>['Выберите группу' => ['Selected'=>'selected']], 'prompt' => ' -- Выберите группу --']) ?>

    <?= $form->field($model, 'batchid')->dropDownList(ArrayHelper::map(app\models\Batch::find()->all(), 'id', 'name'),['options' =>['Выберите группу' => ['Selected'=>'selected']], 'prompt' => ' -- Выберите заезд --']) ?>

    <?= $form->field($model, 'routeid')->dropDownList(ArrayHelper::map(app\models\Route::find()->all(), 'id', 'name'),['options' =>['Выберите группу' => ['Selected'=>'selected']], 'prompt' => ' -- Выберите маршрут --']) ?>

    <?= $form->field($model, 'iscap')->checkbox() ?>

    <?= $form->field($model, 'isdeleted')->checkbox(['default'=>0]) ?>

    <?= $form->field($model, 'sex')->dropDownList([
        'М'=>'Мужской',
        'Ж'=>'Женский'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Назад', ['user/index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>