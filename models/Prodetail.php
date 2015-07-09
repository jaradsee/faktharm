<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prodetail".
 *
 * @property integer $PRODETAIL_ID
 * @property integer $PROHEAD_ID
 * @property string $PRODETAIL_NAME
 * @property integer $ORDERITEM
 * @property string $ACTIVE_STATUS
 */
class Prodetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prodetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PRODETAIL_ID'], 'required'],
            [['PRODETAIL_ID', 'PROHEAD_ID', 'ORDERITEM'], 'integer'],
            [['PRODETAIL_NAME'], 'string', 'max' => 200],
            [['ACTIVE_STATUS'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PRODETAIL_ID' => 'Prodetail  ID',
            'PROHEAD_ID' => 'Prohead  ID',
            'PRODETAIL_NAME' => 'Prodetail  Name',
            'ORDERITEM' => 'Orderitem',
            'ACTIVE_STATUS' => 'Active  Status',
        ];
    }
}
