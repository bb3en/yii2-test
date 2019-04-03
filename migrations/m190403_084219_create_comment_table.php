<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m190403_084219_create_comment_table extends Migration
{
    // public function up()
    // {
 
    // }

    // public function down()
    // {
   

    // }
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'post_id' => $this->integer()->notNull(),
            'text' => $this->string(),

        ]);

        // creates index for column `author_id`
        $this->createIndex(
            'idx-comment-post_id',
            '{{%comment}}',
            'post_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-comment-post_id',
            '{{%comment}}',
            'post_id',
            '{{%post}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-comment-post_id',
            '{{%comment}}'
        );

        $this->dropIndex(
            'idx-comment-post_id',
            '{{%comment}}'
        );

        $this->dropTable('{{%comment}}');
    }
}
