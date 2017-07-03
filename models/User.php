<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $patronymic
 * @property string $rfcid
 * @property integer $groupid
 * @property integer $batchid
 * @property integer $routeid
 * @property integer $iscap
 * @property integer $isdeleted
 *
 * @property Moneylog[] $moneylogs
 * @property Group $group
 * @property Batch $batch
 * @property Route $route
 * @property UserMorda[] $userMordas
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'patronymic', 'rfcid'], 'required'],
            [['groupid', 'batchid', 'routeid', 'iscap', 'isdeleted'], 'integer'],
            [['firstname', 'lastname', 'patronymic', 'rfcid'], 'string', 'max' => 50],
            [['groupid'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['groupid' => 'id']],
            [['batchid'], 'exist', 'skipOnError' => true, 'targetClass' => Batch::className(), 'targetAttribute' => ['batchid' => 'id']],
            [['routeid'], 'exist', 'skipOnError' => true, 'targetClass' => Route::className(), 'targetAttribute' => ['routeid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Имя',
            'lastname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'rfcid' => 'id браслета',
            'groupid' => 'Команда',
            'batchid' => 'Заезд',
            'routeid' => 'Маршрут',
            'iscap' => 'Капитан',
            'isdeleted' => 'Удален',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMoneylogs()
    {
        return $this->hasMany(Moneylog::className(), ['userid' => 'id']);
    }

    public function deleteRecursive($relations = array()){
        if($relations == []){
            $relations = ["batch","route","group","moneylog"];
        }
        parent::deleteRecursive($relations);
        
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoute()
    {
        return $this->hasOne(Route::className(), ['id' => 'routeid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserMordas()
    {
        return $this->hasMany(UserMorda::className(), ['userid' => 'id']);
    }
	
	
	public function updateUserFromJson($data)
	{
		$query = Yii::$app->db->createCommand('UPDATE user SET rfcid=:rfcid WHERE id=:id')
		->bindValue(':rfcid',data['rfcid'])
		->bindValue(':id',data['id']);
		if($query){
			return true;
		}else{
			return false;
		}
	}
	
	public function addUserFromJson($data)
	{
		$query = Yii::$app->db->createCommand('INSERT INTO `user`(`firstname`, `lastname`, `patronymic`, `rfcid`, `groupid`, `batchid`, `routeid`) VALUES (:firstname,:lastname,:patronymic,:rfcid,:groupid,:batchid,:routeid')
		->bindValue(':firstname',data['firstname'])
		->bindValue(':lastname',data['lastname'])
		->bindValue(':patronymic',data['patronymic'])
		->bindValue(':rfcid',data['rfcid'])
		->bindValue(':batchid',data['batchid'])
		->bindValue(':routeid',data['routeid']);
	}
}
