<?php

namespace app\models;

use Yii;
use yii\helpers\Url;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use app\models\Prohead;
use app\models\Prodetail;
use app\models\Adddep;

/**
 * This is the model class for table "friskhead".
 *
 * @property string $risk_id
 * @property string $risk_date
 * @property string $risk_time
 * @property integer $department
 * @property string $miss
 * @property string $event
 * @property string $safety
 * @property string $outcome_pt
 * @property string $outcome_guest
 * @property string $outcome_staff
 * @property double $outcome_price
 * @property string $solve_begin
 * @property string $sum_solve
 * @property string $risk_level
 * @property string $risk_head_department
 * @property string $risk_status
 * @property string $prohead
 * @property string $prodetail
 * @property string $program_text
 * @property string $login_name
 * @property string $risk_sum_dep
 * @property integer $risk_simple
 * @property string $date_input
 * @property string $last_update
 * @property string $last_staff
 * @property string $print_url
 * @property string $act_st
 * @property string $ref
 * @property integer $clinictype
 * @property integer $place_id
 * @property string $staff
 * @property string $risk_again
 * @property string $date_complete
 * @property string $risk_ref_no
 * @property integer $input_complain
 */
class Friskhead extends \yii\db\ActiveRecord
{
    const UPLOAD_FOLDER='riskphoto';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'friskhead';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['risk_date', 'risk_time', 'event', 'safety', 'outcome_pt'], 'required'],
            [['risk_date', 'date_input', 'last_update', 'date_complete','risk_head_department'], 'safe'],
            [['department', 'risk_simple', 'clinictype', 'place_id', 'input_complain'], 'integer'],
            [['outcome_price'], 'number'],
            [['risk_time'], 'string', 'max' => 5],
            [['miss', 'risk_level', 'risk_status', 'act_st', 'risk_again'], 'string', 'max' => 1],
            [['event', 'safety', 'outcome_pt', 'outcome_guest', 'outcome_staff', 'solve_begin', 'sum_solve', 'program_text', 'risk_sum_dep', 'print_url'], 'string', 'max' => 200],
            [['prohead', 'prodetail'], 'string', 'max' => 6],
            [['login_name', 'last_staff', 'staff', 'risk_ref_no'], 'string', 'max' => 100],
            [['ref'], 'string', 'max' => 50],
            [['ref'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'risk_id' => 'Risk ID',
            'risk_date' => 'Risk Date',
            'risk_time' => 'Risk Time',
            'department' => 'Department',
            'miss' => 'Miss',
            'event' => 'Event',
            'safety' => 'Safety',
            'outcome_pt' => 'Outcome Pt',
            'outcome_guest' => 'Outcome Guest',
            'outcome_staff' => 'Outcome Staff',
            'outcome_price' => 'Outcome Price',
            'solve_begin' => 'Solve Begin',
            'sum_solve' => 'Sum Solve',
            'risk_level' => 'Risk Level',
            'risk_head_department' => 'Risk Head Department',
            'risk_status' => 'Risk Status',
            'prohead' => 'Prohead',
            'prodetail' => 'Prodetail',
            'program_text' => 'Program Text',
            'login_name' => 'Login Name',
            'risk_sum_dep' => 'Risk Sum Dep',
            'risk_simple' => 'Risk Simple',
            'date_input' => 'Date Input',
            'last_update' => 'Last Update',
            'last_staff' => 'Last Staff',
            'print_url' => 'Print Url',
            'act_st' => 'Act St',
            'ref' => 'เลข fk กับ upload ใช้กับ upload ajax',
            'clinictype' => 'Clinictype',
            'place_id' => 'Place ID',
            'staff' => 'Staff',
            'risk_again' => 'Risk Again',
            'date_complete' => 'Date Complete',
            'risk_ref_no' => 'Risk Ref No',
            'input_complain' => 'Input Complain',
        ];
    }
    
    public static function getUploadPath(){
        return Yii::getAlias('@webroot').'/'.self::UPLOAD_FOLDER.'/';
    }

    public static function getUploadUrl(){
        return Url::base(true).'/'.self::UPLOAD_FOLDER.'/';
    }

    public function getThumbnails($ref,$event_name){
         $uploadFiles   = Uploadsp::find()->where(['ref'=>$ref])->all();
         $preview = [];
        foreach ($uploadFiles as $file) {
            $preview[] = [
                'url'=>self::getUploadUrl(true).$ref.'/'.$file->real_filename,
                'src'=>self::getUploadUrl(true).$ref.'/thumbnail/'.$file->real_filename,
                'options' => ['title' => $event_name]
            ];
        }
        return $preview;
    }

}
