<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180818_143025_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' =>$this->string(255),
            'email' =>$this->string(255),
            'password' =>$this->string(255),
            'status' =>$this->integer(10),
            'role' =>$this->integer(10),
            'authkey' =>$this->string(225)



        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
