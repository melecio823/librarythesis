<?php

use yii\db\Migration;

/**
 * Handles the creation of table `customer`.
 */
class m180812_042538_create_customer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('customer', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer(11),
            'firstname' => $this->string(191)->notNull(),
            'lastname' => $this->string(191)->notNull(),
            'course' => $this->string(100),
            'year'=> $this->integer(1), 
            'phone' => $this->integer(11),
            'address' => $this->string(191),
        ]);
    }
        
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('customer');
    }
}
