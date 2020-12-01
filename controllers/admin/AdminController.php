<?php

namespace app\controllers\admin;

use app\models\Category;
use app\models\CategoryForm;
use app\models\Product;
use app\models\ProductForm;
use yii\web\Controller;
use Yii;
use yii\web\UploadedFile;

class AdminController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAddCategory()
    {
        $model = new CategoryForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $category = new Category();

            if ($category->find()->where(['name' => Yii::$app->request->post('CategoryForm')['name']])->one()) {

                Yii::$app->session->setFlash('error', 'Категория с таким названием уже существует');
            } else {

                $category->storeCategory(
                    Yii::$app->request->post('CategoryForm')['name'],
                    Yii::$app->request->post('CategoryForm')['description']
                );

                Yii::$app->session->setFlash('success', 'Категория успешно добавлена!');
            }
        }

        return $this->render('add_category', ['model' => $model]);
    }

    public function actionAddProduct()
    {
        $model = new ProductForm();
        $categories = Category::find()->select(['id', 'name'])->orderBy('id')->asArray()->all();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $product = new Product();

            if ($product->find()->where(['name' => Yii::$app->request->post('ProductForm')['name']])->one()) {

                Yii::$app->session->setFlash('error', 'Товар товар с таким именем уже существует!');
            } else {

                $model->photo = UploadedFile::getInstance($model, 'photo');
                $model->upload();

                $data = Yii::$app->request->post('ProductForm');
                $data['photo'] = $model->photo->name;

                $product->storeProduct($data);
                Yii::$app->session->setFlash('success', 'Товар успешно добавлен!');
            }
        }

        return $this->render('add_product', ['model' => $model, 'categories' => $categories]);
    }

    public function actionAddCoupon()
    {
        return $this->render('add_coupon');
    }
}