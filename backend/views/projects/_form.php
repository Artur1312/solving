<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Companies;
use backend\models\Status;
use yii\helpers\Url;

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
    <?= $form->field($model, 'photos[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
    <?php
    $gallery = $model->getImages();

//    print_r($gallery);
    $img_str='';
    echo ' <div class="row">';
    foreach($gallery as $img_g){
        $url_delete=Url::toRoute(['projects/deleteimg', 'id_projectsimg' => $model->id, 'id_img' => $img_g->id]);
        $img_str.='		
		<div class="col-xs-6 col-md-3">
		
		<div  class="thumbnail project_image_form">
		<a class="btn delete_project_img" title="Delete this item?" href="'.$url_delete.'" data-id="'.$img_g->id.'"><span class="glyphicon glyphicon-remove"></span></a>  
		  <a class="fancybox img-rounded" rel="gallery1" href="'. $img_g->getUrl().'">'.Html::img($img_g->getUrl('350x350'), ['alt' => '']).'</a>
		  
		</div>
		</div> ';
    }
    echo $img_str;
    echo '</div>';
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
