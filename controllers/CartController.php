<?php


namespace app\controllers;

use Yii;
use yii\web\Controller;

class CartController extends Controller
{
    public function actionCart()
    {
        if(!Yii::$app->session['products']){
            return $this->render('cart', ['products' => null]);
        } else {
            return $this->render('cart', ['products' => Yii::$app->session->get('products')]);
        }
    }
}