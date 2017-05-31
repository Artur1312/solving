<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model backend\models\Projects */
$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<!---->
<?php
//$img = $model->getImage();
//$gallery = $model->getImages();
//
//$img_str='';
//foreach($gallery as $img2){
//    $img_str.='<a class="fancybox img-thumbnail" rel="gallery1" href="'. $img2->getUrl().'">'.Html::img($img2->getUrl('84x85'), ['alt' => '']).'</a>';
//}

?>
<div class="projects-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Projects', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'project_name',
            'company.company',
            'description',
            'status.status',
            //  -------variant 4, it worked in DetailView----

//            [
//                'attribute' => 'image',
//                'value' =>  $img_str,
//                'format' => 'html',
//            ],

          //  -------variant 1----
//            [
//                'format' => 'image',
//                'value' => function ($model) {
//                    return $model->getImageUrl();
//                },
//            ],
            //  -------variant 2----
//            [
//                'attribute' => 'image',
//                'format' => 'html',
//                'value' => function ($data) {
//                    return Html::img(Yii::getAlias('@web').'/upload/'. $data['gallery'],
//                        ['width' => '70px']);
//                },
//            ],
            //  -------variant 3----
//            array(
//                'attribute' => 'image',
//                'format' => 'image',
//                'value'=>function($model) {   return Html::img($model->getImageUrl(100),
//                    ['width' => '50px', 'style' => 'max-width:100%']);
//                },
//
//            ),
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
