<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

//use Yii;
?>

<?php if (Yii::$app->session->hasFlash('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->getFlash('error')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>

<div style="width: 600px; padding-left: 3em; padding-top: 2em">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map($categories, 'id', 'name'),
        ['prompt' => 'Выберите категорию']) ?>
    <?= $form->field($model, 'name')->textInput(); ?>
    <?= $form->field($model, 'price')->textInput(); ?>
    <?= $form->field($model, 'description')->textarea(); ?>
    <?= $form->field($model, 'photo')->fileInput() ?>
    <?= Html::submitButton('Добавить товар', ['class' => 'btn btn-success']); ?>
    <?php $form->end(); ?>
</div>

