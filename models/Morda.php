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
 *
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
            [['fio', 'description', 'pic'], 'required'],
            [['fio'], 'string', 'max' => 100],
            [['description', 'pic'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserMordas()
    {
        return $this->hasMany(UserMorda::className(), ['mordaid' => 'id']);
    }
}
