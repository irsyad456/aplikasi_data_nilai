<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "proyeks".
 *
 * @property int $id
 * @property int $client_id
 * @property string $nama_proyek
 * @property string $desk_proyek
 * @property string $kategori_proyek
 * @property float $nilai_proyek
 * @property string $tanggal_mulai
 * @property string $tanggal_selesai
 * @property string|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Clients $client
 * @property PerjalananProyek[] $perjalananProyeks
 * @property ProyekPegawai[] $proyekPegawais
 */
class Proyeks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proyeks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'nama_proyek', 'desk_proyek', 'nilai_proyek', 'tanggal_mulai', 'tanggal_selesai'], 'required'],
            [['client_id'], 'integer'],
            [['nilai_proyek'], 'number'],
            [['tanggal_mulai', 'tanggal_selesai', 'created_at', 'updated_at'], 'safe'],
            [['status', 'kategori_proyek'], 'string'],
            [['nama_proyek', 'desk_proyek'], 'string', 'max' => 255],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::class, 'targetAttribute' => ['client_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Klien Proyek',
            'nama_proyek' => 'Nama Proyek',
            'desk_proyek' => 'Desk Proyek',
            'kategori_proyek' => 'Kategori Proyek',
            'nilai_proyek' => 'Nilai Proyek',
            'tanggal_mulai' => 'Tanggal Mulai',
            'tanggal_selesai' => 'Tanggal Selesai',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::class, ['id' => 'client_id']);
    }

    /**
     * Gets query for [[PerjalananProyeks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerjalananProyeks()
    {
        return $this->hasMany(PerjalananProyek::class, ['proyek_id' => 'id']);
    }

    /**
     * Gets query for [[ProyekPegawais]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProyekPegawais()
    {
        return $this->hasMany(ProyekPegawai::class, ['proyek_id' => 'id']);
    }

    public function getPegawai()
    {
        return $this->hasMany(Pegawai::class, ['id' => 'pegawai_id'])->viaTable('proyek_pegawai', ['proyek_id' => 'id']);
    }
}
