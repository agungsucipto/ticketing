<?php

use yii\db\Migration;

/**
 * Class m231209_100754_table_tickets
 */
class m231209_100754_table_tickets extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->createTable('tickets', [
        'id' => $this->primaryKey(),
        'ticket_no' => $this->string(32)->notNull(),
        'description' => $this->text()->notNull(),
        'created_at' => $this->dateTime()->notNull(),
        'updated_at' => $this->dateTime(),
        'created_by' => $this->integer()->notNull(),
        'updated_by' => $this->integer(),
      ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231209_100754_table_tickets cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231209_100754_table_tickets cannot be reverted.\n";

        return false;
    }
    */
}
