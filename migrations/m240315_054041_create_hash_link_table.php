<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%hash_link}}`.
 */
class m240315_054041_create_hash_link_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%hash_link}}', [
            'id' => $this->primaryKey(),
            'link' => $this->string()->notNull(),
            'hash' => $this->string()->notNull()->unique()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%hash_link}}');
    }
}
