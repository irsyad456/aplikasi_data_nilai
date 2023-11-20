<?php

namespace backend\models;

use Yii;
use yii\validators\ImageValidator;

/**
 * This is the model class for table "pegawai".
 *
 * @property int $id
 * @property string $nama
 * @property string $alamat
 * @property string|null $tanggal_lahir
 * @property string|null $status
 * @property string $email
 * @property int $no_telp
 * @property string|null $tgl_bergabung
 * @property string $profile
 *
 * @property DetailPerjalanan[] $detailPerjalanans
 * @property PerjalananProyek[] $perjalananProyeks
 * @property ProgressPerjalanan[] $progressPerjalanans
 * @property ProyekPegawai[] $proyekPegawais
 * @property User[] $users
 */
class Pegawai extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'alamat', 'email', 'no_telp', 'profile'], 'required'],
            [['tanggal_lahir', 'tgl_bergabung'], 'safe'],
            [['status'], 'string'],
            [['file'], 'image', 'extensions' => ['png', 'jpg', 'jpeg', 'gif'], 'maxSize' => 1024 * 1024, 'maxWidth' => 170, 'maxHeight' => 170],
            [['no_telp'], 'integer'],
            [['nama', 'alamat', 'email', 'profile'], 'string', 'max' => 255],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'tanggal_lahir' => 'Tanggal Lahir',
            'status' => 'Status',
            'email' => 'Email',
            'no_telp' => 'No Telp',
            'tgl_bergabung' => 'Tgl Bergabung',
            'file' => 'Profile',
        ];
    }

    /**
     * Gets query for [[DetailPerjalanans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailPerjalanans()
    {
        return $this->hasMany(DetailPerjalanan::class, ['pegawai_id' => 'id']);
    }

    /**
     * Gets query for [[PerjalananProyeks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerjalananProyeks()
    {
        return $this->hasMany(PerjalananProyek::class, ['pegawai_id' => 'id']);
    }

    /**
     * Gets query for [[ProgressPerjalanans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgressPerjalanans()
    {
        return $this->hasMany(ProgressPerjalanan::class, ['pegawai_id' => 'id']);
    }

    /**
     * Gets query for [[Proyeks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProyeks()
    {
        return $this->hasMany(Proyek::class, ['id' => 'proyek_id'])->viaTable('proyek_pegawai', ['pegawai_id' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(User::class, ['pegawai_id' => 'id']);
    }
}
