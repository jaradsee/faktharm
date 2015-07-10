<?php

namespace app\models;

use Yii;
use yii\helpers\Url;
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
            [['risk_date', 'risk_time', 'event_name'], 'required'],
            [['risk_date', 'date_complete'], 'safe'],
            [['input_complain'], 'integer'],
            [['event_name'], 'string', 'max' => 200],
            [['ref'], 'string', 'max' => 50],
            [['risk_again'], 'string', 'max' => 1],
            [['risk_ref_no'], 'string', 'max' => 100],
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
            'event_name' => 'Event Name',
            'ref' => 'Ref',
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

