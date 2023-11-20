<?php

use yii\db\Migration;

/**
 * Class m231024_070658_students
 */
class m231024_070658_students extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%students}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'nomor_induk' => $this->string(20)->unique()->notNull(),
            'nama' => $this->string(255),
            'alamat' => $this->text(),
            'tanggal_lahir' => $this->date(),
            'created_at' => $this->date(),
            'updated_at' => $this->date()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('students');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231024_070658_students cannot be reverted.\n";

        return false;
    }
    */
}
