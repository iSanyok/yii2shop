<?php


namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'categories';
    }

    public function getProducts()
    {
        return $this->hasOne(Product::class, ['id' => 'category_id']);
    }

    public function storeCategory($name, $description)
    {
        $category = new Category();
        $category->name = $name;
        $category->description = $description;
        $category->save();
    }
}