<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Priskheadearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="priskhead-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'risk_id') ?>

    <?= $form->field($model, 'risk_date') ?>

    <?= $form->field($model, 'event_name') ?>

    <?= $form->field($model, 'ref') ?>

    <?= $form->field($model, 'risk_again') ?>

    <?php // echo $form->field($model, 'date_complete') ?>

    <?php // echo $form->field($model, 'risk_ref_no') ?>

    <?php // echo $form->field($model, 'input_complain') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
