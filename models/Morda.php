<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "morda".
 *
 * @property integer $id
 * @property string $fio
 * @property string $description
 * @property string $pic
 * @property integer $batchid
 * @property integer $isdeleted
 *
 * @property Batch $batch
 * @property UserMorda[] $userMordas
 */
class Morda extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'morda';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fio', 'description', 'pic', 'batchid'], 'required'],
            [['batchid', 'isdeleted'], 'integer'],
            [['fio'], 'string', 'max' => 100],
            [['description', 'pic'], 'string', 'max' => 255],
            [['batchid'], 'exist', 'skipOnError' => true, 'targetClass' => Batch::className(), 'targetAttribute' => ['batchid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'Fio',
            'description' => 'Description',
            'pic' => 'Pic',
            'batchid' => 'Batchid',
            'isdeleted' => 'Isdeleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBatch()
    {
        return $this->hasOne(Batch::className(), ['id' => 'batchid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserMordas()
    {
        return $this->hasMany(UserMorda::className(), ['mordaid' => 'id']);
    }
}
