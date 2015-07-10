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
use kartik\widgets\DepDrop;


/* @var $this yii\web\View */
/* @var $model app\models\Ftriskhead */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ftriskhead-form">

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
        

    <?= $form->field($model, 'event_name')->textInput(['maxlength' => true]) ?>
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
    
    
    <?= $form->field($model, 'risk_again')->textInput(['maxlength' => true]) ?>

    

    <?= $form->field($model, 'miss')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'safety')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'outcome_pt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'outcome_guest')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'outcome_staff')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'outcome_price')->textInput() ?>

    <?= $form->field($model, 'solve_begin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sum_solve')->textInput(['maxlength' => true]) ?>

   

    <?= $form->field($model, 'risk_head_department')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'risk_status')->textInput(['maxlength' => true]) ?>

    

    <?= $form->field($model, 'program_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'login_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'risk_sum_dep')->textInput(['maxlength' => true]) ?>

    

    <?= $form->field($model, 'date_input')->textInput() ?>

    <?= $form->field($model, 'last_update')->textInput() ?>

    <?= $form->field($model, 'last_staff')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'print_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_st')->textInput(['maxlength' => true]) ?>

    

   

    <?= $form->field($model, 'staff')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_complete')->textInput() ?>

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
                        'uploadUrl' => Url::to(['/ftriskhead/upload-ajax']),
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
