<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "riskplace".
 *
 * @property integer $PLACE_ID
 * @property string $PLACE_NAME
 */
class Riskplace extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'riskplace';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PLACE_ID'], 'required'],
            [['PLACE_ID'], 'integer'],
            [['PLACE_NAME'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PLACE_ID' => 'Place  ID',
            'PLACE_NAME' => 'Place  Name',
        ];
    }
}
