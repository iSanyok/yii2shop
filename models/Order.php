<?php


namespace app\models;


use yii\db\ActiveRecord;

class Order extends ActiveRecord
{
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['id' => 'product_id'])
            ->viaTable('orders_products', ['order_id' => 'id']);
    }
}