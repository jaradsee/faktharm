<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dep".
 *
 * @property integer $DEP_ID
 * @property string $DEP_NAME
 * @property string $FULLNAME
 * @property string $TYPE
 * @property string $PASSWORD
 * @property string $LEVEL
 * @property string $DEP
 */
class Dep extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dep';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DEP_ID'], 'required'],
            [['DEP_ID'], 'integer'],
            [['DEP_NAME', 'FULLNAME', 'PASSWORD', 'DEP'], 'string', 'max' => 200],
            [['TYPE', 'LEVEL'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'DEP_ID' => 'Dep  ID',
            'DEP_NAME' => 'Dep  Name',
            'FULLNAME' => 'Fullname',
            'TYPE' => 'Type',
            'PASSWORD' => 'Password',
            'LEVEL' => 'Level',
            'DEP' => 'Dep',
        ];
    }
}
