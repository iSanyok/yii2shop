<?php


namespace app\models;


use yii\base\Model;

class ProductForm extends Model
{
    public $category_id;
    public $name;
    public $description;
    public $photo;
    public $price;

    public function attributeLabels()
    {
        return [
            'name' => 'Название товара',
            'description' => 'Описание товара',
            'category_id' => 'Название категории',
            'price' => 'Цена товара',
        ];
    }

    public function rules()
    {
        return [
            [['name', 'description', 'category_id', 'price'], 'required'],
            [['category_id', 'price'], 'integer'],
        ];
    }

}