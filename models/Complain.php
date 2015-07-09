<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "complain".
 *
 * @property integer $COMPLAIN_ID
 * @property string $COMPLAIN_NAME
 */
class Complain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'complain';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['COMPLAIN_ID'], 'required'],
            [['COMPLAIN_ID'], 'integer'],
            [['COMPLAIN_NAME'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'COMPLAIN_ID' => 'Complain  ID',
            'COMPLAIN_NAME' => 'Complain  Name',
        ];
    }
}
