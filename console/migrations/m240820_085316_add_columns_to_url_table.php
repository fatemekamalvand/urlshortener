<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%url}}`.
 */
class m240820_085316_add_columns_to_url_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('url', 'click_count', $this->integer()->defaultValue(0));
        $this->addColumn('url', 'user_id', $this->integer());

        // creates index for column `referee`
        $this->createIndex(
            'idx-url-user_id',
            'url',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-url-user_id',
            'url',
            'user_id',
            'url',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
