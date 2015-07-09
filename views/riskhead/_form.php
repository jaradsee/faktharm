<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;


use kartik\widgets\Select2;
use kartik\widgets\TypeaheadBasic;
use kartik\widgets\DepDrop;
use kartik\widgets\FileInput;

use app\models\Adddep;
use app\models\Clinictype;
use app\models\Level;
use app\models\Status;
use app\models\Simple;
use app\models\Prohead;
use app\models\Prodetail;
use app\models\Riskplace;
//use app\models\Employee;
//use app\models\Province;
//use app\models\Amphur;
//use app\models\District;

use yii\helpers\VarDumper;

/* @var $this yii\web\View */
/* @var $model app\models\Riskhead */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="riskhead-form">

     <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="col-xs-6 col-sm-4 col-md-4">

    <?= $form->field($model, 'risk_date')->widget(DatePicker::classname(), [
        'language' => 'th',
        'dateFormat' => 'yyyy-MM-dd',
        'clientOptions'=>[
          'changeMonth'=>true,
          'changeYear'=>true,
        ],
        'options'=>['class'=>'form-control']
      ]) ?>
         </div>

     <div class="col-xs-4 col-sm-2 col-md-2">
    <?= $form->field($model, 'risk_time')->textInput(['maxlength' => true]) ?>
    
    </div>
    <div class="col-xs-6 col-sm-4 col-md-6">
    

    <?= $form->field($model, 'department')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Adddep::find()->all(),'ADDDEP_ID','DEP_NAME'),
        'options' => ['placeholder' => 'เลือกแแผนก ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
       </div>   

     <div class="col-xs-6 col-sm-4">
        
     <?= $form->field($model, 'miss')->inline()->radioList(app\models\RiskHead::itemAlias('miss')) ?>
    </div> 
    
    <div class="col-xs-6 col-sm-4">
     <?= $form->field($model, 'risk_again')->inline()->radioList(app\models\RiskHead::itemAlias('risk_again')) ?>
    </div>
    
    <div class="col-xs-6 col-sm-4">
    <?= $form->field($model, 'act_st')->inline()->radioList(app\models\RiskHead::itemAlias('act_st')) ?>
     </div>
    
    <div class="col-xs-6 col-sm-6">
    
    <?= $form->field($model, 'clinictype')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Clinictype::find()->all(),'CLINICTYPE_ID','CLINIC_NAME'),
        'options' => ['placeholder' => 'เลือกประเภทความเสี่ยง ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>  
    </div>     
    
    <div class="col-xs-6 col-sm-6">
    <?= $form->field($model, 'place_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Riskplace::find()->all(),'PLACE_ID','PLACE_NAME'),
        'options' => ['placeholder' => 'เลือกสถานที่เกิดเหตุ ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>   
     
     </div>     
   
   <?= $form->field($model, 'event')->textarea(['rows' => 3]) ?>
    
    

    <?= $form->field($model, 'safety')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'outcome_pt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'outcome_guest')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'outcome_staff')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'outcome_price')->textInput() ?>

    <?= $form->field($model, 'solve_begin')->textInput(['maxlength' => true]) ?>
    
    
    

    <?= $form->field($model, 'sum_solve')->textInput(['maxlength' => true]) ?>

   

    <?= $form->field($model, 'risk_head_department')->widget(Select2::classname(), [
        'language' => 'de',
        'data' => ArrayHelper::map(app\models\Dep::find()->all(),'DEP_ID','FULLNAME'),
        'options' => ['multiple'=>true, 'placeholder' => 'เลือกหน่วยงาน/ทีมที่เกี่ยวข้อง ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    

    <div class="col-sm-6 col-md-6">
       <?= $form->field($model, 'prohead')->dropdownList(
            ArrayHelper::map(Prohead::find()->all(),
            'PROHEAD_ID',
            'PROHEAD_NAME'),
            [
                'id'=>'ddl-prohead',
                'prompt'=>'เลือกโปรแกรมความเสี่ยง'
       ]); ?>
    </div>
     <div class="col-sm-6 col-md-6">
       <?= $form->field($model, 'prodetail')->widget(DepDrop::classname(), [
            'options'=>['id'=>'ddl-prodetail'],
            'data'=> $prodetail,
            'pluginOptions'=>[
                'depends'=>['ddl-prohead'],
                'placeholder'=>'เลือกหัวข้ออุบัติการณ์...',
                'url'=>Url::to(['/riskhead/get-prodetail'])
            ]
        ]); ?>
    </div>
    
     <div class="col-sm-6 col-md-6 col-md-6">
    <?= $form->field($model, 'program_text')->textInput(['maxlength' => true]) ?>
  </div>
    
    <div class="col-sm-6 col-md-6">
   <?= $form->field($model, 'risk_simple')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Simple::find()->all(),'SIMPLE_ID','SIMPLE_NAME'),
        'options' => ['placeholder' => 'เลือกหัวข้อตาม simple ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>   
    
     </div>
    <div class="col-sm-6 col-md-6">
     <?= $form->field($model, 'risk_level')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Level::find()->all(),'level','name'),
        'options' => ['placeholder' => 'เลือกระดับความรุนแรง ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>   
    
     </div>
    
 
    
    <div class="col-sm-6 col-md-6 col-md-6">
     <?= $form->field($model, 'input_complain')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\app\models\Complain::find()->all(),'COMPLAIN_ID','COMPLAIN_NAME'),
        'options' => ['placeholder' => 'เลือกช่องทางรับเรื่องร้องเรียน ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>   
    
     </div>
    <?= $form->field($model, 'login_name')->textInput(['maxlength' => true]) ?>

    
    <?= $form->field($model, 'risk_sum_dep')->textInput() ?>

    

    <?= $form->field($model, 'date_input')->textInput() ?>

    <?= $form->field($model, 'last_update')->textInput() ?>

    <?= $form->field($model, 'last_staff')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'print_url')->textInput(['maxlength' => true]) ?>

    

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
                        'uploadUrl' => Url::to(['/riskhead/upload-ajax']),
                        'uploadExtraData' => [
                            'ref' => $model->ref,
                        ],
                        'maxFileCount' => 100
                    ]
                ]);
    ?>
    </div>
    </div>

    

    

    <?= $form->field($model, 'staff')->textInput(['maxlength' => true]) ?>

   

    <?= $form->field($model, 'date_complete')->textInput() ?>

    <?= $form->field($model, 'risk_ref_no')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'risk_status')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Status::find()->all(),'STATUS_ID','STATUS_NAME'),
        'options' => ['placeholder' => 'เลือกสถานะของรายการ ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>   
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
