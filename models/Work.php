<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "work".
 *
 * @property int $id
 * @property string $createdWork
 * @property string $startWork
 * @property string $finishWork
 * @property string $detail
 * @property int $totalHours
 *
 * @property Client[] $clients
 */
class Work extends \yii\db\ActiveRecord
{
    public $image;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'work';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    
    {
        
        return [
            [['createdWork', 'startWork', 'finishWork', 'detail', 'totalHours',], 'required'],
            [['createdWork', 'startWork', 'finishWork'], 'safe'],
            [['totalHours'], 'integer'],
            [['detail'], 'string', 'max' => 45],
            [['createdWork'], 'unique',],
            [['startWork'], 'unique'],
            [['finishWork'], 'unique'],
            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'createdWork' => Yii::t('app', 'Fecha de creacion'),
            'startWork' => Yii::t('app', 'Fecha de Inicio'),
            'finishWork' => Yii::t('app', 'Fecha de Finalizacion'),
            'detail' => Yii::t('app', 'Detalle de trabajo'),
            'totalHours' => Yii::t('app', 'Total de Horas'),
            'image' => Yii::t('app', 'Imagen'),
        ];
    }

    /**
     * Gets query for [[Clients]].
     *
     * @return \yii\db\ActiveQuery
     */
     public function getClients()
    {
        return $this->hasMany(Client::className(), ['idWork' => 'id']);
    } 
}
