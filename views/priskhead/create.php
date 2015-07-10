<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Priskhead */

$this->title = 'Create Priskhead';
$this->params['breadcrumbs'][] = ['label' => 'Priskheads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="priskhead-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'initialPreview'=>[],
        'initialPreviewConfig'=>[]
    ]) ?>

</div>
