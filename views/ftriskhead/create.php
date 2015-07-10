<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ftriskhead */

$this->title = 'Create Ftriskhead';
$this->params['breadcrumbs'][] = ['label' => 'Ftriskheads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ftriskhead-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'prodetail'=> $prodetail,
        'initialPreview'=>[],
        'initialPreviewConfig'=>[]
    ]) ?>

</div>
