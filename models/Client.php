<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $clientName
 * @property string $address
 * @property string $email
 * @property int $phoneNumber
 * @property string $registerDate
 * @property int $idWork
 *
 * @property User $idUser0
 * @property Work $idWork0
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['clientName', 'address', 'email', 'phoneNumber', 'registerDate', 'idWork'], 'required'],
            [['phoneNumber', 'idUser', 'idWork'], 'integer'],
            [['registerDate'], 'safe'],
            [['clientName', 'address', 'email'], 'string', 'max' => 45],
            [['clientName'], 'unique'],
            [['email'], 'unique'],
            [['phoneNumber'], 'unique'],
            [['registerDate'], 'unique'],
            [['idWork'], 'exist', 'skipOnError' => true, 'targetClass' => Work::className(), 'targetAttribute' => ['idWork' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'clientName' => Yii::t('app', 'Client Name'),
            'address' => Yii::t('app', 'Address'),
            'email' => Yii::t('app', 'Email'),
            'phoneNumber' => Yii::t('app', 'Phone Number'),
            'registerDate' => Yii::t('app', 'Register Date'),
            
            'idWork' => Yii::t('app', 'Id Work'),
        ];
    }

    

    /**
     * Gets query for [[IdWork0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdWork0()
    {
        return $this->hasOne(Work::className(), ['id' => 'idWork']);
    }
}
