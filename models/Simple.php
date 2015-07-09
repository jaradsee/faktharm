<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "simple".
 *
 * @property integer $SIMPLE_ID
 * @property string $SIMPLE_NAME
 */
class Simple extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'simple';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SIMPLE_ID', 'SIMPLE_NAME'], 'required'],
            [['SIMPLE_ID'], 'integer'],
            [['SIMPLE_NAME'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SIMPLE_ID' => 'Simple  ID',
            'SIMPLE_NAME' => 'Simple  Name',
        ];
    }
}
