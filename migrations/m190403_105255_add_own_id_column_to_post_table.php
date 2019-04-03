<?php

use yii\db\Migration;

/**
 * Handles adding own_id to table `{{%post}}`.
 */
class m190403_105255_add_own_id_column_to_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%post}}', 'own_id', $this->integer()->notNull());
 
        // creates index for column `author_id`
        $this->createIndex(
            'idx-post-own_id',
            '{{%post}}',
            'own_id'
        );
        
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-post-own_id',
            '{{%post}}',
            'own_id',
            '{{%user}}',
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
