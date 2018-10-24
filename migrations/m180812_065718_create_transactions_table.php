<?php

use yii\db\Migration;

/**
 * Handles the creation of table `transactions`.
 */
class m180812_065718_create_transactions_table extends Migration
{
    
        /**
         * {@inheritdoc}s
         */
        public function safeUp()
        {
            $this->createTable('transactions', [
                'id' => $this->primaryKey(),
                'item_id' =>$this->integer()->notNull(),
                'customer_id' =>$this->integer()->notNull(),
                'date_borrow' => $this->date()->notNull(),
                'date_returned' => $this->date(),
                'fines' => $this->money(),
                'fines_status' =>$this->string(10),
            ]);
        $this->createIndex('idx-transactions-customer_id','transactions','customer_id');
        $this->createIndex('idx-transactions-item_id','transactions','item_id');
    $this->addForeignKey(
        'fk-transactions-customer',
        'transactions','customer_id',
        'customer','id'
    );
    $this->addForeignKey(
        'fk-transactions-item',
        'transactions','item_id',
        'item','id'
    );
    }
    
    /**
    * {@inheritdoc}
    */
    public function safeDown()
    {
    $this->dropForeignKey('fk-transactions-customer','transactions');
    $this->dropForeignKey('fk-transactions-item','transactions');
    $this->dropIndex('idx-transactions-customer_id', 'transactions');
    $this->dropIndex('idx-transactions-item_id', 'transactions');
    $this->dropTable('transactions'); 
    }

} 