<?php


namespace app\controllers;


use yii\web\Controller;

class ShopController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}