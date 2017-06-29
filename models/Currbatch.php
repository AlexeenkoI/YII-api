<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "currbatch".
 *
 * @property integer $currentbatch
 *
 * @property Batch $currentbatch0
 */
class Currbatch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'currbatch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['currentbatch'], 'required'],
            [['currentbatch'], 'integer'],
            [['currentbatch'], 'exist', 'skipOnError' => true, 'targetClass' => Batch::className(), 'targetAttribute' => ['currentbatch' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'currentbatch' => 'Currentbatch',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrentbatch0()
    {
        return $this->hasOne(Batch::className(), ['id' => 'currentbatch']);
    }
}
