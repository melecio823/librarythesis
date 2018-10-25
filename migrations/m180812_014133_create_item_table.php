<?php

use yii\db\Migration;

/**
 * Handles the creation of table `item`.
 */
class m180812_014133_create_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('item', [
            'id' => $this->primaryKey(),
            'barcode_number' => $this->string(100)->notNull(),
            'title' => $this->string(100)->notNull(),
            'acc_no' => $this->integer(100)->notNull(),
            'call_no' => $this->integer(100)->notNull(),    
            'author' => $this->string(100)->notNull(),
            'publisher' => $this->string(100)->notNull(),
            'c_year' => $this->integer(100)->notNull(),
            'type' => $this->string(100)->notNull(),
            'no_of_copies' => $this->integer(100)->notNull(),
            'status' => $this->string(100)  
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('item');
    }
}
