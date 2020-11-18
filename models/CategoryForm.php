<?php


namespace app\models;


use yii\base\Model;

class CategoryForm extends Model
{
    public $name;
    public $description;

    public function attributeLabels()
    {
        return [
            'name' => 'Название категории',
            'description' => 'Описание категории',
        ];
    }

    public function rules()
    {
        return [
            [['name', 'description'], 'required']
        ];
    }
}