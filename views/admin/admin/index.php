<?php

use yii\helpers\Html;

?>
<div>
    <div style="padding-bottom: 1em">
        <?= Html::a(Html::button('Посмотреть заказы', ['class' => 'btn', 'style' => ['color' => 'black']]),
            ['admin/admin/index'], ['style' => 'padding-left: 2em']); ?>
    </div>
    <div style="padding-bottom: 1em">
        <?= Html::a(Html::button('Добавить категорию', ['class' => 'btn', 'style' => ['color' => 'black']]),
            ['admin/admin/add-category'], ['style' => 'padding-left: 2em']); ?>
    </div>
    <div style="padding-bottom: 1em">
        <?= Html::a(Html::button('Добавить товар', ['class' => 'btn', 'style' => ['color' => 'black']]),
            ['admin/admin/add-product'], ['style' => 'padding-left: 2em']); ?>
    </div>
    <div style="padding-bottom: 1em">
        <?= Html::a(Html::button('Добавить купон', ['class' => 'btn', 'style' => ['color' => 'black']]),
            ['admin/admin/add-coupon'], ['style' => 'padding-left: 2em']); ?>
    </div>
</div>
