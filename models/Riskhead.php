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
 * This is the model class for table "riskhead".
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
 * @property resource $risk_sum_dep
 * @property integer $risk_simple
 * @property string $date_input
 * @property string $last_update
 * @property string $last_staff
 * @property string $print_url
 * @property string $act_st
 * @property resource $ref
 * @property integer $clinictype
 * @property integer $place_id
 * @property string $staff
 * @property string $risk_again
 * @property string $date_complete
 * @property string $risk_ref_no
 * @property integer $input_complain
 */
class Riskhead extends \yii\db\ActiveRecord
{
    const UPLOAD_FOLDER='photolibrarys';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'riskhead';
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
            [['risk_sum_dep'], 'string'],
            [['risk_time'], 'string', 'max' => 5],
            [['miss', 'risk_level', 'risk_status', 'act_st', 'risk_again'], 'string', 'max' => 1],
            [['event', 'safety', 'outcome_pt', 'outcome_guest', 'outcome_staff', 'solve_begin', 'sum_solve', 'program_text', 'print_url'], 'string', 'max' => 200],
            //[['risk_head_department'], 'string', 'max' => 2],
            [['prohead', 'prodetail'], 'string', 'max' => 6],
            [['login_name', 'last_staff', 'staff', 'risk_ref_no'], 'string', 'max' => 100],
             [['ref'], 'unique']
        ];
    }
public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'date_input',
                'updatedAtAttribute' => 'last_update',
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'risk_id' => 'Risk ID',
            'risk_date' => 'วันที่เกิดเหตุการณ์',
            'risk_time' => 'เวลา',
            'department' => 'แผนกที่รายงาน',
            'miss' => 'Miss',
            'event' => 'บรรยายเหตุการณ์ (แบบสั้นๆ ระบุปัญหา)',
            'safety' => 'การป้องกันปัญหาไม่ให้เกิดขึ้นซ้ำ(มาตรการป้องกัน)',
            'outcome_pt' => 'ผลลัพธ์ที่เกิดขึ้นกับผู้ป่วย',
            'outcome_guest' => 'ผลลัพธ์ที่เกิดขึ้นกับญาติ',
            'outcome_staff' => 'ผลลัพธ์ที่เกิดขึ้นกับเจ้าหน้าที่',
            'outcome_price' => 'ความเสียหาย(ค่าชดเชย/ค่าซ่อมบำรุง)',
            'solve_begin' => 'การแก้ปัญหาเฉพาะหน้า',
            'sum_solve' => 'สรุปผลการแก้ปัญหา',
            'risk_level' => 'ระดับความรุนแรง',
            'risk_head_department' => 'หน่วยงาน/ทีมนำที่เกี่ยวข้อง',
            'risk_status' => 'สถานะรายการ',
            'prohead' => 'โปรแกรม',
            'prodetail' => 'หัวข้ออุบัติการณ์',
            'program_text' => 'อื่นๆ ระบุ',
            'login_name' => 'Login Name',
            'risk_sum_dep' => 'การทบทวนของหน่วยงาน (มาตรการป้องกัน)',
            'risk_simple' => 'Risk Simple',
            'date_input' => 'Date Input',
            'last_update' => 'Last Update',
            'last_staff' => 'Last Staff',
            'print_url' => 'Print Url',
            'act_st' => 'การทบทวน',
            'ref' => 'เลข fk กับ upload ใช้กับ upload ajax',
            'clinictype' => 'Clinictype',
            'place_id' => 'สถานที่เกิดเหตุ',
            'staff' => 'Staff',
            'risk_again' => 'อุบัติการณ์ซ้ำ',
            'date_complete' => 'Date Complete',
            'risk_ref_no' => 'Risk Ref No',
            'input_complain' => 'ช่องทางการรับรายงาน',
        ];
    }
    public function getArray($value)
    {
        return explode(',', $value);
    }

    public function setToArray($value)
    {   
        return is_array($value)?implode(',', $value):NULL;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if(!empty($this->social)){
                $this->social = $this->setToArray($this->social);
                $this->skill = $this->setToArray($this->skill);
            }
            return true;
        } else {
            return false;
        }
    }

    public static function itemAlias($type,$code=NULL) {
        $_items = array(
            'miss' => array(
                '1' => 'miss',
                '2' => 'nearmiss',
            ),
            'risk_again' => array(
                '1' => 'อุบัติการณ์ซ้ำ',
                
            ),
            'act_st' => array(
                '1' => 'ทบทวนเอง',
                '2' => 'ขอเวที่ทบทวน'
                
            ),
            
            
            'skill'=>[
                'Objective C'=>'Objective C',
                'Python'=>'Python',
                'Java'=>'Java',
                'JavaScript'=>'JavaScript',
                'PHP'=>'PHP',
                'SQL'=>'SQL',
                'Ruby'=>'Ruby',
                'FoxPro'=>'FoxPro',
                'C++'=>'C++',
                'C'=>'C',
                'ASP'=>'ASP',
                'Assembly'=>'Assembly',
                'Visual Basic'=>'Visual Basic'
            ],
            'social' => [
                'facebook' => 'Facebook',
                'twiter' => 'Twiter',
                'google+' => 'Google+',
                'tumblr' => 'Tumblr'
            ],
        );
        

        if (isset($code)){
            return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
        }
        else{         
            return isset($_items[$type]) ? $_items[$type] : false;    
        }
    }

    
    public static function getResumePath(){
        return Yii::getAlias('@webroot').'/'.self::RESUME_PATH;
    }

    public static function getResumeUrl(){
        return Url::base(true).'/'.self::RESUME_PATH;
    }


    // Inverse Relations  & Virtual attribute

    public function getFullname(){
        return $this->title.$this->name.' '.$this->surname;
    }

    public function getProheads(){
        return @$this->hasOne(Prohead::className(),['PROHEAD_ID'=>'prohead']);
    }
    public function getProheadName(){
        return @$this->proheads->PROHEAD_NAME;
    }

    public function getProdetails(){
        return @$this->hasOne(Prodetail::className(),['PRODETAIL_ID'=>'prodetail']);
    }
    public function getProdetailName(){
        return @$this->prodetails->PRODETAIL_NAME;
    }

    
    public static function getUploadPath(){
        return Yii::getAlias('@webroot').'/'.self::UPLOAD_FOLDER.'/';
    }

    public static function getUploadUrl(){
        return Url::base(true).'/'.self::UPLOAD_FOLDER.'/';
    }

    public function getThumbnails($ref,$event_name){
         $uploadFiles   = Uploads::find()->where(['ref'=>$ref])->all();
         $preview = [];
        foreach ($uploadFiles as $file) {
            $preview[] = [
                'url'=>self::getUploadUrl(true).$ref.'/'.$file->real_filename,
                'src'=>self::getUploadUrl(true).$ref.'/thumbnail/'.$file->real_filename,
                'options' => ['title' => $event]
            ];
        }
        return $preview;
    }

}
