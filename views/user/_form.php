<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\base\ViewContextInterface;
use yii\base\Configurable;
use yii\helpers\BaseHtml;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rfcid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'groupid')->dropDownList($model,[]) ?>

    <?= $form->field($model, 'batchid')->dropDownList($model,[]) ?>

    <?= $form->field($model, 'routeid')->dropDownList($model,[]) ?>

    <?= $form->field($model, 'iscap')->checkbox() ?>

    <?= $form->field($model, 'isdeleted')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a("Назад", ['user/index'], ['class'=>'btn btn-danger'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
