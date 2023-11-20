<?php

namespace backend\models;

use Yii;
use frontend\models\ProgressPerjalanan;

/**
 * This is the model class for table "perjalanan_proyek".
 *
 * @property int $id
 * @property int $pegawai_id
 * @property int $proyek_id
 * @property string $nama_perjalanan
 * @property string $desk_perjalanan
 * @property float $modal
 * @property float $pengeluaran
 * @property string|null $status_perjalanan
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property DetailPerjalanan[] $detailPerjalanans
 * @property Pegawai $pegawai
 * @property ProgressPerjalanan[] $progressPerjalanans
 * @property Proyeks $proyek
 */
class PerjalananProyek extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perjalanan_proyek';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pegawai_id', 'proyek_id', 'nama_perjalanan', 'desk_perjalanan', 'modal'], 'required'],
            [['pegawai_id', 'proyek_id'], 'integer'],
            [['modal', 'pengeluaran'], 'number'],
            [['status_perjalanan', 'tgl_perjalanan', 'created_at', 'updated_at'], 'safe'],
            [['nama_perjalanan', 'desk_perjalanan'], 'string', 'max' => 255],
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
            'pegawai_id' => 'Pembuat Perjalanan',
            'proyek_id' => 'Proyek',
            'nama_perjalanan' => 'Nama Perjalanan',
            'desk_perjalanan' => 'Desk Perjalanan',
            'modal' => 'Modal',
            'pengeluaran' => 'Pengeluaran',
            'status_perjalanan' => 'Status Perjalanan',
            'tgl_perjalanan' => 'Tanggal Berangkat',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[DetailPerjalanans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailPerjalanans()
    {
        return $this->hasMany(DetailPerjalanan::class, ['perjalanan_id' => 'id']);
    }

    /**
     * Gets query for [[Pegawai]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPegawai()
    {
        return $this->hasMany(Pegawai::class, ['id' => 'pegawai_id'])->viaTable('detail_perjalanan', ['perjalanan_id' => 'id']);
    }

    /**
     * Gets query for [[ProgressPerjalanans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgressPerjalanans()
    {
        return $this->hasMany(ProgressPerjalanan::class, ['perjalanan_id' => 'id']);
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

    public function getClient()
    {
        return $this->hasOne(Clients::class, ['id' => 'client_id'])->viaTable('proyeks', ['id' => 'proyek_id']);
    }
}
