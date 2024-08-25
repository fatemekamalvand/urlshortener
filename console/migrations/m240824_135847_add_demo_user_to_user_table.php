<?php

use yii\db\Migration;

/**
 * Class m240824_135847_add_demo_user_to_user_table
 */
class m240824_135847_add_demo_user_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
// اضافه کردن یک کاربر جدید به جدول user
        $this->insert('user', [
            'username' => 'admin',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('admin123'),
            'email' => 'admin@example.com',
            'status' => 10,
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240824_135847_add_demo_user_to_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240824_135847_add_demo_user_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
