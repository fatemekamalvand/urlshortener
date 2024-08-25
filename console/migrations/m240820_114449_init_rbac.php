<?php

use yii\db\Migration;

/**
 * Class m240820_114449_init_rbac
 */
class m240820_114449_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        // Add roles
        $user = $auth->createRole('user');
        $user->description = 'URL holder';
        $auth->add($user);

        $admin = $auth->createRole('admin');
        $admin->description = 'Administrator';
        $auth->add($admin);

        // Add permissions
        $manageUsers = $auth->createPermission('manageUsers');
        $manageUsers->description = 'Manage users';
        $auth->add($manageUsers);

        $manageUrls = $auth->createPermission('manageUrls');
        $manageUrls->description = 'Manage URLs';
        $auth->add($manageUrls);

        // Assign permissions to roles
        $auth->addChild($admin, $manageUsers);
        $auth->addChild($admin, $manageUrls);

        $auth->addChild($user, $manageUrls);

        // Assign roles to users
        $auth->assign($admin, 1); // Admin user ID
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240820_114449_init_rbac cannot be reverted.\n";

        return false;
    }

//    public function safeDown()
//    {
//        $auth = Yii::$app->authManager;
//        $auth->removeAll();
//        return true;
//    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240820_114449_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
