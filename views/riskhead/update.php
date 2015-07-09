<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Riskhead */

$this->title = 'Update Riskhead: ' . ' ' . $model->risk_id;
$this->params['breadcrumbs'][] = ['label' => 'Riskheads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->risk_id, 'url' => ['view', 'id' => $model->risk_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="riskhead-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
         'prodetail'=> $prodetail,
         
         'initialPreview'=>$initialPreview,
         'initialPreviewConfig'=>$initialPreviewConfig
    ]) ?>

</div>
