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
        $this->createTable('grades', [
            'id' => $this->primaryKey(),
            'student_id' => $this->integer()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231024_071617_grades cannot be reverted.\n";

        return false;
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
