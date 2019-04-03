<?php

use yii\db\Migration;

/**
 * Handles adding name to table `{{%comment}}`.
 */
class m190403_090304_add_name_column_to_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%comment}}', 'name', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%comment}}', 'name');
    }
}
