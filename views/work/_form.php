<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Work */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="work-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'createdWork')->textInput(['date'=>$model->createdWork]) ?>

    <?= $form->field($model, 'startWork')->textInput() ?>

    <?= $form->field($model, 'finishWork')->textInput() ?>

    <?= $form->field($model, 'detail')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'totalHours')->textInput() ?>

    <?= Html::img($model->image,['width'=>'60px']) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
