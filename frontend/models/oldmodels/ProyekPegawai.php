<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "proyek_pegawai".
 *
 * @property int $id
 * @property int|null $pegawai_id
 * @property int|null $proyek_id
 *
 * @property Pegawai $pegawai
 * @property Proyeks $proyek
 */
class ProyekPegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proyek_pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pegawai_id', 'proyek_id'], 'integer'],
            [['pegawai_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::class, 'targetAttribute' => ['pegawai_id' => 'id']],
            [['proyek_id'], 'exist', 'skipOnError' => true, 'targetClass' => Proyeks::class, 'targetAttribute' => ['proyek_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pegawai_id' => 'Pegawai',
            'proyek_id' => 'Proyek ID',
        ];
    }

    /**
     * Gets query for [[Pegawai]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPegawai()
    {
        return $this->hasOne(Pegawai::class, ['id' => 'pegawai_id']);
    }

    /**
     * Gets query for [[Proyek]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProyek()
    {
        return $this->hasOne(Proyeks::class, ['id' => 'proyek_id']);
    }
}
