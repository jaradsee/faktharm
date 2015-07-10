<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "uploadsp".
 *
 * @property integer $upload_id
 * @property string $ref
 * @property string $file_name
 * @property string $real_filename
 * @property string $create_date
 * @property integer $type
 */
class Uploadsp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uploadsp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_date'], 'safe'],
            [['type'], 'integer'],
            [['ref'], 'string', 'max' => 50],
            [['file_name', 'real_filename'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'upload_id' => 'Upload ID',
            'ref' => 'Ref',
            'file_name' => 'File Name',
            'real_filename' => 'Real Filename',
            'create_date' => 'Create Date',
            'type' => 'Type',
        ];
    }
}
