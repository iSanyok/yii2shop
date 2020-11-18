<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders_products}}`.
 */
class m201118_083641_create_orders_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders_products}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'order_id' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-orders_products-product_id',
            'orders_products',
            'product_id'
        );

        $this->addForeignKey(
            'fk-orders_products-product_id',
            'orders_products',
            'product_id',
            'products',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-orders_products-order_id',
            'orders_products',
            'order_id'
        );

        $this->addForeignKey(
            'fk-orders_products-order_id',
            'orders_products',
            'order_id',
            'orders',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%orders_products}}');
    }
}
