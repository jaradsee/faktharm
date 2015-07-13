<?php

namespace app\models;

use Yii;
use yii\helpers\Url;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use app\models\Prohead;
use app\models\Prodetail;
use app\models\Adddep;
use app\models\Complain;
/**
 * This is the model class for table "priskhead".
 *
 * @property string $risk_id
 * @property string $risk_date
 * @property string $event_name
 * @property string $ref
 * @property string $risk_again
 * @property string $date_complete
 * @property string $risk_ref_no
 * @property integer $input_complain
 */
class Priskhead extends \yii\db\ActiveRecord
{
    const UPLOAD_FOLDER='riskphoto';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'priskhead';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['risk_date', 'risk_time', 'event_name','safety', 'outcome_pt'], 'required'],
            [['risk_date','date_input', 'last_update','date_complete','risk_head_department'], 'safe'],
            [['department', 'risk_simple', 'clinictype', 'place_id','input_complain'], 'integer'],
            [['outcome_price'], 'number'],
            [['risk_sum_dep'], 'string'],
            [['event_name'], 'string', 'max' => 200],
            [['ref'], 'string', 'max' => 50],
            [['miss', 'risk_level', 'risk_status', 'act_st', 'risk_again'], 'string', 'max' => 1],
            [['safety', 'outcome_pt', 'outcome_guest', 'outcome_staff', 'solve_begin', 'sum_solve', 'program_text', 'print_url'], 'string', 'max' => 200],
            [['risk_ref_no'], 'string', 'max' => 100],
            [['prohead', 'prodetail'], 'string', 'max' => 6],
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
            'risk_time' => 'เวลา',
            'event_name' => 'บรรยายเหตุการณ์ (แบบสั้นๆ ระบุปัญหา)',
            'ref' => 'Ref',
            'department' => 'แผนกที่รายงาน',
            'miss' => 'Miss',
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

    public function getComplains(){
        return @$this->hasOne(Complain::className(),['COMPLAIN_ID'=>'input_complain']);
    }
    public function getComplainName(){
        return @$this->complains->COMPLAIN_NAME;
    }
    
    public function getClinictypes(){
        return @$this->hasOne(Clinictype::className(),['CLINICTYPE_ID'=>'clinictype']);
    }
    public function getClinictypeName(){
        return @$this->clinictypes->CLINIC_NAME;
    }
    
    public function getSimples(){
        return @$this->hasOne(Simple::className(),['SIMPLE_ID'=>'risk_simple']);
    }
    public function getSimpleName(){
        return @$this->simples->SIMPLE_NAME;
    }
    
    public function getLevels(){
        return @$this->hasOne(Level::className(),['level'=>'risk_level']);
    }
    public function getLevelName(){
        return @$this->levels->name;
    }
    
    public function getRiskplaces(){
        return @$this->hasOne(Riskplace::className(),['PLACE_ID'=>'place_id']);
    }
    public function getRiskplaceName(){
        return @$this->riskplaces->PLACE_NAME;
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

