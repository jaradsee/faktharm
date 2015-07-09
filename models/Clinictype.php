<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clinictype".
 *
 * @property integer $CLINICTYPE_ID
 * @property string $CLINIC_NAME
 */
class Clinictype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clinictype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CLINICTYPE_ID'], 'required'],
            [['CLINICTYPE_ID'], 'integer'],
            [['CLINIC_NAME'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CLINICTYPE_ID' => 'Clinictype  ID',
            'CLINIC_NAME' => 'Clinic  Name',
        ];
    }
}
