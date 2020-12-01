<?php


namespace app\controllers;


use app\models\Category;
use yii\web\Controller;

class CategoryController extends Controller
{
    public function actionCategory()
    {
        $categories = Category::find()->all();

        return $this->render('category', ['categories' => $categories]);
    }
}