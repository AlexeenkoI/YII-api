<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grouppriority".
 *
 * @property integer $id
 * @property integer $groupid
 * @property integer $batchid
 * @property integer $p1
 * @property integer $p2
 * @property integer $p3
 * @property integer $p4
 *
 * @property Group $group
 * @property Batch $batch
 */
class Grouppriority extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grouppriority';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['groupid', 'batchid', 'p1', 'p2', 'p3', 'p4'], 'required'],
            [['groupid', 'batchid', 'p1', 'p2', 'p3', 'p4'], 'integer'],
            [['groupid'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['groupid' => 'id']],
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
            'groupid' => 'Groupid',
            'batchid' => 'Batchid',
            'p1' => 'P1',
            'p2' => 'P2',
            'p3' => 'P3',
            'p4' => 'P4',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'groupid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBatch()
    {
        return $this->hasOne(Batch::className(), ['id' => 'batchid']);
    }
}
