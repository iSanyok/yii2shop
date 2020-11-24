<div style="margin-left: 5em;">
    <?php if (isset($products)): ?>
        <?php foreach ($products as $product): ?>
            <div>
                <label class="title"><?= $product['product']['name'] ?></label>
            </div>
            <div>
                <label class="title"><?= $product['product']['description'] ?></label>
            </div>
            <div>
                <label class="title"><?= $product['product']['price'] ?></label>
            </div>
            <div>
                <label class="title">Count: <?= $product['count'] ?></label>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <label class="title">Корзина пуста.</label>
    <?php endif; ?>
</div>