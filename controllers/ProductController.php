<?php


namespace app\controllers;


use app\models\Product;
use Yii;
use yii\web\Controller;
use yii\web\JsonResponseFormatter;
use yii\web\Response;

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

                            return $this->asJson($this->response(200,
                                'Товар добавлен в корзину',
                                $products[$key]['count']));
                        }
                    }
                    $products[] = ['product' => $product, 'count' => 1];
                } else {

                    $products[] = ['product' => $product, 'count' => 1];
                }

                $session['products'] = $products;
                $session->close();

                return $this->asJson($this->response(200, 'Товар добавлен в корзину'));
            }
        }
        return $this->response(500, 'Произошла какая-то ошибка');
    }

    public function actionRemoveProduct()
    {
        if (Yii::$app->request->isAjax) {
            if ($product_id = Yii::$app->request->post('id')) {

                $product = Product::find()->where(['id' => $product_id])->one();

                $session = Yii::$app->session;
                $session->open();

                $products = $session['products'];

                foreach ($products as $key => $item) {

                    if ($item['product']['id'] == $product->id) {

                        $products[$key]['count']--;
                        if ($products[$key]['count'] < 1) {

                            unset($products[$key]);
                        }
                        $session['products'] = $products;
                        $session->close();

                        return $this->asJson($this->response(200,
                            'Товар удален из корзины',
                            ($products[$key]['count'] ?? 0)));
                    }
                }

                $session['products'] = $products;
                $session->close();

                return $this->asJson($this->response(200, 'Товар удален из корзины', 0));
            }
        }

        return $this->response(500, 'Произошла какая-то ошибка', 0);
    }

    private function response($code, $message, $count = 1)
    {
        $this->total_amount();
        return ['code' => $code, 'message' => $message, 'count' => $count, 'total_amount' => $this->total_amount()];
    }

    private function total_amount()
    {
        $products = Yii::$app->session->get('products');
        $total_amount = 0;

        foreach($products as $product){

            $total_amount += $product['product']['price'] * $product['count'];
        }

        Yii::$app->session->set('total_amount', $total_amount);
        return $total_amount;
    }
}