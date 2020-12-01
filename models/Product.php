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

    public function storeProduct($form)
    {
        $product = new Product();
        $product->category_id = $form['category_id'];
        $product->name = $form['name'];
        $product->description = $form['description'];
        $product->price = $form['price'];
        $product->photo = $form['photo'];
        $product->save();
    }
}