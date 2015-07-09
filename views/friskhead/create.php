<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Friskhead */

$this->title = 'Create Friskhead';
$this->params['breadcrumbs'][] = ['label' => 'Friskheads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="friskhead-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'prodetail'=> $prodetail,
        'initialPreview'=>[],
        'initialPreviewConfig'=>[]
    ]) ?>

</div>
