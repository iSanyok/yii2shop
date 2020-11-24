<?php


namespace app\controllers;


use app\models\Product;
use yii\web\Controller;

class ShopController extends Controller
{
    public function actionIndex()
    {
        $products = Product::find()->all();

        return $this->render('index', ['products' => $products]);
    }
}