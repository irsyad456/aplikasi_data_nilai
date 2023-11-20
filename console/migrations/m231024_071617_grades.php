<?php

use yii\db\Migration;

/**
 * Class m231024_071617_grades
 */
class m231024_071617_grades extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%grades}}', [
            'id' => $this->primaryKey(),
            'student_id' => $this->integer()->notNull(),
            'subject_id' => $this->integer()->notNull(),
            'jenis_nilai' => $this->string(50),
            'nilai' => $this->float(),
            'created_at' => $this->date(),
            'updated_at' => $this->date(),
        ]);
        //foreign students to grades
        $this->addForeignKey('fk_grades_students', '{{%grades}}', 'student_id', '{{%students}}', 'id');
        //foreign grades to students
        $this->addForeignKey('fk_grades_subjects', '{{%grades}}', 'subject_id', '{{%subjects}}', 'id');
        //foreign user to students
        $this->addForeignKey('fk_students_user', '{{%students}}', 'user_id', '{{%user}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231024_071617_grades cannot be reverted.\n";

        return false;
    }
    */
}
