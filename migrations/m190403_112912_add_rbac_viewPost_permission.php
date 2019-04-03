<?php

use yii\db\Migration;

/**
 * Class m190403_112912_add_rbac_viewPost_permission
 */
class m190403_112912_add_rbac_viewPost_permission extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        // add "viewPost" permission
        $viewPost = $auth->createPermission('viewPost');
        $viewPost->description = 'View post';
        $auth->add($viewPost);

        $auth->addChild($auth->getRoles()['author'], $viewPost);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190403_112912_add_rbac_viewPost_permission cannot be reverted.\n";

        return false;
    }
    */
}
