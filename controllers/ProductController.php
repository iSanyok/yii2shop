<?php


namespace app\controllers;


use app\models\Product;
use Yii;
use yii\web\Controller;

class ProductController extends Controller
{
    public function actionShow($id)
    {
        $product = Product::find()->where(['id' => $id])->one();

        return $this->render('product', ['product' => $product]);
    }

    public function actionAddProduct()
    {
        if (Yii::$app->request->isAjax) {
            if ($product_id = Yii::$app->request->post('id')) {

                $product = Product::find()->where(['id' => $product_id])->one();

                $session = Yii::$app->session;
                $session->open();

                $products = $session['products'];
                if (isset($products)) {

                    foreach ($products as $key => $item) {

                        if ($item['product']['id'] == $product->id) {

                            $products[$key]['count']++;
                            $session['products'] = $products;
                            $session->close();

                            return 'Товар добавлен в корзину';
                        }
                    }
                    $products[] = ['product' => $product, 'count' => 1];
                } else {

                    $products[] = ['product' => $product, 'count' => 1];
                }

                $session['products'] = $products;
                $session->close();

                return 'Товар добавлен в корзину';
            }
        }
        return false;
    }
}