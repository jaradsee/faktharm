<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "adddep".
 *
 * @property integer $ADDDEP_ID
 * @property string $RISK_ID
 * @property integer $DEP_ID
 * @property string $DEP_NAME
 */
class Adddep extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'adddep';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['RISK_ID'], 'required'],
            [['DEP_ID'], 'integer'],
            [['RISK_ID'], 'string', 'max' => 7],
            [['DEP_NAME'], 'string', 'max' => 200],
            [['RISK_ID', 'DEP_ID'], 'unique', 'targetAttribute' => ['RISK_ID', 'DEP_ID'], 'message' => 'The combination of Risk  ID and Dep  ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ADDDEP_ID' => 'Adddep  ID',
            'RISK_ID' => 'Risk  ID',
            'DEP_ID' => 'Dep  ID',
            'DEP_NAME' => 'Dep  Name',
        ];
    }
}
