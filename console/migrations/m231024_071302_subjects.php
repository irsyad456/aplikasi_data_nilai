<?php

use yii\db\Migration;

/**
 * Class m231024_071302_subjects
 */
class m231024_071302_subjects extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subjects}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(255)->unique(),
            'bobot' => $this->float(),
            'created_at' => $this->date(),
            'updated_at' => $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('subjects');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231024_071302_subjects cannot be reverted.\n";

        return false;
    }
    */
}
