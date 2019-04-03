<?php

use yii\db\Migration;

/**
 * Class m190403_112322_add_rbac_updateOwnPost_rule
 */
class m190403_112322_add_rbac_updateOwnPost_rule extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        
        // add the rule
        $rule = new app\rbac\AuthorRule;
        $auth->add($rule);
        
        // add the "updateOwnPost" permission and associate the rule with it.
        $updateOwnPost = $auth->createPermission('updateOwnPost');
        $updateOwnPost->description = 'Update own post';
        $updateOwnPost->ruleName = $rule->name;

        $auth->add($updateOwnPost);
        
        // "updateOwnPost" will be used from "updatePost"
        $auth->addChild($updateOwnPost,$auth->getPermissions()['updatePost']);

        // allow "author" to update their own posts
        $auth->addChild($auth->getRoles()['author'], $updateOwnPost);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //
        $this->delete('auth_item_child', ['child' => 'updateOwnPost']);
        $this->delete('auth_item_child', ['parent' => 'updateOwnPost']);
        $this->delete('auth_item', ['name' => 'updateOwnPost']);    
        //$this->delete('auth_rule', ['name' => 'isAuthor']);

    }
}
