<div style="margin-left: 5em;">
    <?php if (isset($products)): ?>
        <?php foreach ($products as $product): ?>
            <div style="padding-top: 3em" id="product<?= $product['product']['id'] ?>">
                <div style="float: left">
                    <img src="/uploads/<?= $product['product']['photo'] ?>" width="324" height="200" alt="sorry :-("/>
                </div>
                <div style="padding-left: 27em">
                    <div>
                        <label class="title">Название: <?= $product['product']['name'] ?></label>
                    </div>
                    <div>
                        <label class="title">Описание: <?= $product['product']['description'] ?></label>
                    </div>
                    <div>
                        <label class="title">Цена: <?= $product['product']['price'] ?></label>
                    </div>
                    <div>
                        <label class="title">Количество:</label>
                    </div>
                    <div id="#asd">
                        <button class="btn btn-danger btn-remove" id="<?= $product['product']['id'] ?>">-</button>
                        <label class="count" id="count<?= $product['product']['id'] ?>"><?= $product['count'] ?></label>
                        <button class="btn btn-success btn-add" id="<?= $product['product']['id'] ?>">+</button>
                    </div>
                </div>
            </div>
            <div style="clear: left"></div>
        <?php endforeach; ?>
        <label class="title" id="total_amount">Общая стоимость: <?= Yii::$app->session->get('total_amount') ?></label>
    <?php else: ?>
        <label class="title">Корзина пуста.</label>
    <?php endif; ?>
    <button class="btn btn-success" style="margin-top: 4em">Оформить заказ</button>
</div>

<?php
$js = <<<JS
$('.btn-add').on('click', function(event) {
    $.ajax({
        url: 'index.php?r=product/add-product',
        type: 'POST',
        data: {id: event.target.id},
        success: function(res) {
            $('#count' + event.target.id).text(res.count);
            $('#total_amount').text('Общая стоимость: ' + res.total_amount);
        },
        error: function(res) {
            alert(res.message);
        }  
    });
});

$('.btn-remove').on('click', function(event) {
    $.ajax({
        url: 'index.php?r=product/remove-product',
        type: 'POST',
        data: {id: event.target.id},
        success: function(res) {
            $('#count' + event.target.id).text(res.count);
            $('#total_amount').text('Общая стоимость: ' + res.total_amount);

            if(res.count < 1) {
                $('#product' + event.target.id).remove();
            }
        },
        error: function(res) {
            alert(res.message);
        }
    });
});
JS;

$this->registerJs($js);
?>
