<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detail_perjalanan".
 *
 * @property int $id
 * @property int|null $pegawai_id
 * @property int|null $perjalanan_id
 *
 * @property Pegawai $pegawai
 * @property PerjalananProyek $perjalanan
 */
class DetailPerjalanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_perjalanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pegawai_id', 'perjalanan_id'], 'required'],
            [['pegawai_id', 'perjalanan_id'], 'integer'],
            [['pegawai_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::class, 'targetAttribute' => ['pegawai_id' => 'id']],
            [['perjalanan_id'], 'exist', 'skipOnError' => true, 'targetClass' => PerjalananProyek::class, 'targetAttribute' => ['perjalanan_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pegawai_id' => 'Pegawai ID',
            'perjalanan_id' => 'Perjalanan ID',
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
     * Gets query for [[Perjalanan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerjalanan()
    {
        return $this->hasOne(PerjalananProyek::class, ['id' => 'perjalanan_id']);
    }
}
