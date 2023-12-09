<?php

use yii\db\Migration;

/**
 * Class m231209_101148_table_ticket_files
 */
class m231209_101148_table_ticket_files extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->createTable('ticket_files', [
        'id' => $this->primaryKey(),
        'ticket_id' => $this->integer()->notNull(),
        'file' => $this->text()->notNull(),
        'created_at' => $this->dateTime()->notNull(),
        'updated_at' => $this->dateTime(),
        'created_by' => $this->integer()->notNull(),
        'updated_by' => $this->integer(),
      ]);

      $this->addForeignKey(
        'fk_ticket_files-ticket_id',
        'ticket_files',
        'ticket_id',
        'tickets',
        'id',
        'CASCADE',
        'CASCADE'
      );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231209_101148_table_ticket_files cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231209_101148_table_ticket_files cannot be reverted.\n";

        return false;
    }
    */
}
