<?php

use yii\db\Migration;

/**
 * Class m231208_140238_init_user_accounts
 */
class m231208_140238_init_user_accounts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->insert('user', [
        'username' => 'admin',
        'email' => 'admin@example.com',
        'password_hash' => Yii::$app->security->generatePasswordHash('admin'),
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231208_140238_init_user_accounts cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231208_140238_init_user_accounts cannot be reverted.\n";

        return false;
    }
    */
}
