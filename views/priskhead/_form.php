<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

use kartik\widgets\Select2;
use kartik\widgets\FileInput;
use kartik\date\DatePicker;

use app\models\Adddep;
use app\models\Clinictype;
use app\models\Level;
use app\models\Status;
use app\models\Simple;
use app\models\Prohead;
use app\models\Prodetail;
use app\models\Riskplace;
use yii\helpers\VarDumper;

/* @var $this yii\web\View */
/* @var $model app\models\Priskhead */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="priskhead-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
    
 <?= $form->field($model, 'ref')->hiddenInput(['maxlength' => 50])->label(false); ?>
    <div class="row">
            <div class="col-sm-6 col-md-6">
             <?= $form->field($model, 'risk_date')->widget(
            DatePicker::className(), [
                'language' => 'th',
                 'options' => ['placeholder' => 'Select issue date ...'],
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
        ]);?>
            </div>
 
        <div class="col-xs-4 col-sm-2 col-md-2">
    <?= $form->field($model, 'risk_time')->textInput(['maxlength' => true]) ?>
    
    </div>

    <div class="col-sm-6 col-md-6">
             <?= $form->field($model, 'date_complete')->widget(
            DatePicker::className(), [
                'language' => 'th',
                 'options' => ['placeholder' => 'Select issue date ...'],
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
        ]);?>
            </div>

    
  <?= $form->field($model, 'event_name')->textInput(['maxlength' => 255]) ?>

    

    <?= $form->field($model, 'risk_again')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'risk_ref_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'input_complain')->textInput() ?>
        
        <div class="form-group field-upload_files">
      <label class="control-label" for="upload_files[]"> ภาพถ่าย </label>
    <div>
    <?= FileInput::widget([
                   'name' => 'upload_ajax[]',
                   'options' => ['multiple' => true,'accept' => 'image/*'], //'accept' => 'image/*' หากต้องเฉพาะ image
                    'pluginOptions' => [
                        'overwriteInitial'=>false,
                        'initialPreviewShowDelete'=>true,
                       'initialPreview'=> $initialPreview,
                        'initialPreviewConfig'=> $initialPreviewConfig,
                        'uploadUrl' => Url::to(['/priskhead/upload-ajax']),
                        'uploadExtraData' => [
                            'ref' => $model->ref,
                        ],
                        'maxFileCount' => 100
                    ]
                ]);
    ?>
    </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-primary').' btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
