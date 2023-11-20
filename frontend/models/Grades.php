<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "grades".
 *
 * @property int $id
 * @property int $student_id
 * @property int $subject_id
 * @property string|null $jenis_nilai
 * @property float|null $nilai
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Students $student
 * @property Subjects $subject
 */
class Grades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'subject_id'], 'required'],
            [['student_id', 'subject_id'], 'integer'],
            [['nilai'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['jenis_nilai'], 'string', 'max' => 50],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Students::class, 'targetAttribute' => ['student_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subjects::class, 'targetAttribute' => ['subject_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student',
            'subject_id' => 'Subject',
            'jenis_nilai' => 'Grade Type',
            'nilai' => 'Grade',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Students::class, ['id' => 'student_id']);
    }

    /**
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subjects::class, ['id' => 'subject_id']);
    }
}
