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
 * This is the model class for table "ftriskhead".
 *
 * @property string $risk_id
 * @property string $risk_date
 * @property string $event_name
 * @property string $ref
 * @property string $risk_again
 * @property integer $department
 * @property string $miss
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
 * @property integer $clinictype
 * @property integer $place_id
 * @property string $staff
 * @property string $date_complete
 */
class Ftriskhead extends \yii\db\ActiveRecord
{
    const UPLOAD_FOLDER='riskphoto';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ftriskhead';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['risk_date', 'event_name', 'safety', 'outcome_pt'], 'required'],
            [['risk_date', 'date_input', 'last_update', 'date_complete'], 'safe'],
            [['department', 'risk_simple', 'clinictype', 'place_id'], 'integer'],
            [['outcome_price'], 'number'],
            [['event_name', 'safety', 'outcome_pt', 'outcome_guest', 'outcome_staff', 'solve_begin', 'sum_solve', 'risk_head_department', 'program_text', 'risk_sum_dep', 'print_url'], 'string', 'max' => 200],
            [['ref'], 'string', 'max' => 50],
            [['risk_again', 'miss', 'risk_level', 'risk_status', 'act_st'], 'string', 'max' => 1],
            [['prohead', 'prodetail'], 'string', 'max' => 6],
            [['login_name', 'last_staff', 'staff'], 'string', 'max' => 100],
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
            'risk_date' => 'Risk Date',
            'event_name' => 'Event Name',
            'ref' => 'Ref',
            'risk_again' => 'Risk Again',
            'department' => 'Department',
            'miss' => 'Miss',
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
            'clinictype' => 'Clinictype',
            'place_id' => 'Place ID',
            'staff' => 'Staff',
            'date_complete' => 'Date Complete',
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
