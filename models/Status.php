<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property string $STATUS_ID
 * @property string $STATUS_NAME
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STATUS_ID'], 'required'],
            [['STATUS_ID'], 'string', 'max' => 1],
            [['STATUS_NAME'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'STATUS_ID' => 'Status  ID',
            'STATUS_NAME' => 'Status  Name',
        ];
    }
}
