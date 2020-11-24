<?php

use yii\helpers\Url;

$this->title = 'Главная';
?>

<div id="logo" class="container">
    <h1><a href="#"><?= Yii::$app->name ?></a></h1>
    <p>In posuere eleifend odio quisque semper augue.</p>
</div>
<div id="page" class="container">
    <div>
        <div class="entry">
            <p>This is <strong><?= Yii::$app->name ?></strong>, a free, fully standards-compliant CSS template designed
                by <a
                        href="http://templated.co" rel="nofollow">TEMPLATED</a>. The photos in this template are
                from <a href="http://fotogrph.com/"> Fotogrph</a>. This free template is released under the <a
                        href="http://templated.co/license">Creative Commons Attribution</a> license, so you're
                pretty much free to do whatever you want with it (even use it commercially) provided you give us
                credit for it. Have fun :) </p>
        </div>
    </div>
</div>
<div id="three-column" class="container">
    <?php for ($i = 0;
    $i < count($products);
    $i++): ?>
    <div class="tbox<?= ($i % 3) + 1 ?>">
        <div class="box-style">
            <div class="content">
                <div class="image"><img src="images/img01.jpg" width="324" height="200" alt=""/></div>
                <h2><?= $products[$i]->name ?></h2>
                <p>Цена: <?= $products[$i]->price ?></p>
                <a href="<?= Url::to(['product/show', 'id' => $products[$i]->id]) ?>" class="button">Подробнее</a>
            </div>
        </div>
    </div>
    <?php if (($i + 1) % 3 == 0): ?>
</div>
<div id="three-column" class="container">
    <?php endif; ?>
    <?php endfor; ?>
</div>
