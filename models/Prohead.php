<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prohead".
 *
 * @property integer $PROHEAD_ID
 * @property string $PROHEAD_NAME
 * @property integer $HEAD_ID
 * @property string $ACTIVE-STATUS
 * @property integer $CLINICTYPE_ID
 */
class Prohead extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prohead';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PROHEAD_ID'], 'required'],
            [['PROHEAD_ID', 'HEAD_ID', 'CLINICTYPE_ID'], 'integer'],
            [['PROHEAD_NAME'], 'string', 'max' => 200],
            [['ACTIVE-STATUS'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PROHEAD_ID' => 'Prohead  ID',
            'PROHEAD_NAME' => 'Prohead  Name',
            'HEAD_ID' => 'Head  ID',
            'ACTIVE-STATUS' => 'Active  Status',
            'CLINICTYPE_ID' => 'Clinictype  ID',
        ];
    }
}
