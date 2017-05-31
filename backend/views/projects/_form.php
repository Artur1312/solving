<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Companies;
use backend\models\Status;
/* @var $this yii\web\View */
/* @var $model backend\models\Projects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projects-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_name')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'company_id')->dropDownList(
        ArrayHelper::map(Companies::find()->all(),'id','company'),
        ['prompt'=>'Select Company']
    ) ?>
    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_id')->dropDownList(
        ArrayHelper::map(Status::find()->all(),'id','status'),
        ['prompt'=>'Select Status']
    )  ?>
<!--    //= $form->field($model, 'image')->fileInput() \\\ $form->field($model, 'photos[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])-->
    <?= $form->field($model, 'image')->fileInput() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
