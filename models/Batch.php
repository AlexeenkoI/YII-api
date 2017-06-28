<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "batch".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 *
 * @property Currbatch $currbatch
 * @property Grouppriority[] $grouppriorities
 * @property Morda[] $mordas
 * @property User[] $users
 */
class Batch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'batch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrbatch()
    {
        return $this->hasOne(Currbatch::className(), ['currentbatch' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrouppriorities()
    {
        return $this->hasMany(Grouppriority::className(), ['batchid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMordas()
    {
        return $this->hasMany(Morda::className(), ['batchid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['batchid' => 'id']);
    }
}
