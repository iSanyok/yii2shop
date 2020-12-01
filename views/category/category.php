<?php

use yii\helpers\Html;

?>

<div style="margin-left: 5em">
    <ul>
        <?php foreach ($categories as $category): ?>
        <li>
            <?= Html::a($category->name, ['shop/index', 'cat_id' => $category->id]) ?>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
