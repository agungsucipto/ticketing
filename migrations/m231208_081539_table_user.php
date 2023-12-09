<?php

use yii\db\Migration;

/**
 * Class m231208_081539_table_user
 */
class m231208_081539_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->createTable('user', [
        'id' => $this->primaryKey(),
        'username' => $this->string(32)->notNull(),
        'auth_key' => $this->string(32)->notNull(),
        'password_hash' => $this->string()->notNull(),
        'password_reset_token' => $this->string(),
        'email' => $this->string()->notNull(),
        'status' => $this->smallInteger()->notNull()->defaultValue(10),
        'created_at' => $this->integer()->notNull(),
        'updated_at' => $this->integer()->notNull(),
      ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231208_081539_table_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231208_081539_table_user cannot be reverted.\n";

        return false;
    }
    */
}
