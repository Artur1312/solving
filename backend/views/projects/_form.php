<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Companies;
use backend\models\Status;

use rico\yii2images\controllers\ImagesController;
/* @var $this yii\web\View */
/* @var $model backend\models\Projects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projects-form">

    <?php $form = ActiveForm::begin([
            'options'=> ['multipart/form-data']
    ]); ?>

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
        <div class="col-md-offset-2 col-md-10">
            <?php
            $photos = $model->getImages();
            ?>
            <div class="row">
                <?php foreach ($photos as $image): ?>
                <div class="col-md-3 text-center">
                    <img src="<?=$image->getUrl('200x200')?>" alt=""/>
                </div>
                <?php endforeach;  ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
