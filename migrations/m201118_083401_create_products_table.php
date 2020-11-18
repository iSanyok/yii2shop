<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m201118_083401_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'name' => $this->string()->unique(),
            'description' => $this->string(),
            'photo' => $this->string(),
        ]);

        $this->createIndex(
            'idx-products-category_id',
            'products',
            'category_id'
        );

        $this->addForeignKey(
            'fk-products-category_id',
            'products',
            'category_id',
            'categories',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products}}');
    }
}
