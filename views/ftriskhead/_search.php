<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FtriskheadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ftriskhead-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'risk_id') ?>

    <?= $form->field($model, 'risk_date') ?>

    <?= $form->field($model, 'event_name') ?>

    <?= $form->field($model, 'ref') ?>

    <?= $form->field($model, 'risk_again') ?>

    <?php // echo $form->field($model, 'department') ?>

    <?php // echo $form->field($model, 'miss') ?>

    <?php // echo $form->field($model, 'safety') ?>

    <?php // echo $form->field($model, 'outcome_pt') ?>

    <?php // echo $form->field($model, 'outcome_guest') ?>

    <?php // echo $form->field($model, 'outcome_staff') ?>

    <?php // echo $form->field($model, 'outcome_price') ?>

    <?php // echo $form->field($model, 'solve_begin') ?>

    <?php // echo $form->field($model, 'sum_solve') ?>

    <?php // echo $form->field($model, 'risk_level') ?>

    <?php // echo $form->field($model, 'risk_head_department') ?>

    <?php // echo $form->field($model, 'risk_status') ?>

    <?php // echo $form->field($model, 'prohead') ?>

    <?php // echo $form->field($model, 'prodetail') ?>

    <?php // echo $form->field($model, 'program_text') ?>

    <?php // echo $form->field($model, 'login_name') ?>

    <?php // echo $form->field($model, 'risk_sum_dep') ?>

    <?php // echo $form->field($model, 'risk_simple') ?>

    <?php // echo $form->field($model, 'date_input') ?>

    <?php // echo $form->field($model, 'last_update') ?>

    <?php // echo $form->field($model, 'last_staff') ?>

    <?php // echo $form->field($model, 'print_url') ?>

    <?php // echo $form->field($model, 'act_st') ?>

    <?php // echo $form->field($model, 'clinictype') ?>

    <?php // echo $form->field($model, 'place_id') ?>

    <?php // echo $form->field($model, 'staff') ?>

    <?php // echo $form->field($model, 'date_complete') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
