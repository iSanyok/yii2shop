<?php


namespace app\controllers;

use Yii;
use yii\web\Controller;

class CartController extends Controller
{
    public function actionCart()
    {
        return $this->render('cart', ['products' => Yii::$app->session->get('products')]);
    }
}