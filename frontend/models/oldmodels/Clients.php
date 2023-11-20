<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property string $nama_client
 * @property string $alamat_client
 * @property string $telp_client
 *
 * @property Proyeks[] $proyeks
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_client', 'alamat_client', 'telp_client'], 'required'],
            [['nama_client', 'alamat_client', 'telp_client'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_client' => 'Nama Client',
            'alamat_client' => 'Alamat Client',
            'telp_client' => 'Telp Client',
        ];
    }

    /**
     * Gets query for [[Proyeks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProyeks()
    {
        return $this->hasMany(Proyeks::class, ['client_id' => 'id']);
    }
}
