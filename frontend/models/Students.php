<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $nomor_induk
 * @property string|null $nama
 * @property string|null $alamat
 * @property string|null $tanggal_lahir
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Grades[] $grades
 * @property User $user
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['nomor_induk'], 'required'],
            [['alamat'], 'string'],
            [['tanggal_lahir', 'created_at', 'updated_at'], 'safe'],
            [['nomor_induk'], 'string', 'max' => 20],
            [['nama'], 'string', 'max' => 255],
            [['nomor_induk'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User (Optional)',
            'nomor_induk' => 'NIK',
            'nama' => 'Name',
            'alamat' => 'Address',
            'tanggal_lahir' => 'Date Of Birth',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Grades]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrades()
    {
        return $this->hasMany(Grades::class, ['student_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
