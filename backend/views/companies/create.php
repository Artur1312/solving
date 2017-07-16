<?php

use yii\helpers\Html;
use backend\models\Companies;


/* @var $this yii\web\View */
/* @var $model backend\models\Companies */

$this->title = 'Create a Company';
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companies-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
