<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Projects */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<?php
$img = $model->getImage();
$gallery = $model->getImages();

$img_str='';
foreach($gallery as $img2){
    $img_str.='<a class="fancybox img-thumbnail" rel="gallery1" href="'. $img2->getUrl().'">'.Html::img($img2->getUrl('84x85'), ['alt' => '']).'</a>';
}

?>
<div class="projects-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'project_name',
            'company.company',
            'description',
            'status.status',

            [
                'attribute' => 'image',
                'value' =>  $img_str,
                'format' => 'html',
            ],

        ],
    ]) ?>




</div>
