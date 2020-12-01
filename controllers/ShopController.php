<?php


namespace app\controllers;


use app\models\Product;
use yii\web\Controller;

class ShopController extends Controller
{
    public function actionIndex($cat_id = null)
    {
        if($cat_id){

            $products = Product::find()->where(['category_id' => $cat_id])->all();
        } else {

            $products = Product::find()->all();
        }

        return $this->render('index', ['products' => $products]);
    }
}