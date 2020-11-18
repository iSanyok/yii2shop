<?php


namespace app\models;


use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'products';
    }

    public function getCategory()
    {
        return $this->hasMany(Product::class, ['category_id' => 'id']);
    }

    public function storeProduct($category_id, $name, $description)
    {
        $product = new Product();
        $product->category_id = $category_id;
        $product->name = $name;
        $product->description = $description;
        $product->photo = 'photo';
        $product->save();
    }
}