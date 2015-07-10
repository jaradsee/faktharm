<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ftriskhead */

$this->title = 'Update Ftriskhead: ' . ' ' . $model->risk_id;
$this->params['breadcrumbs'][] = ['label' => 'Ftriskheads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->risk_id, 'url' => ['view', 'id' => $model->risk_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ftriskhead-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'prodetail'=> $prodetail,
        'initialPreview'=>$initialPreview,
        'initialPreviewConfig'=>$initialPreviewConfig
    ]) ?>

</div>
