<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Riskhead */

$this->title = 'Create Riskhead';
$this->params['breadcrumbs'][] = ['label' => 'Riskheads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="riskhead-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'prodetail'=> $prodetail,
        
        'initialPreview'=>[],
        'initialPreviewConfig'=>[]
    ]) ?>


</div>
