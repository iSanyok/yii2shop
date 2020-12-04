<div style="margin-left: 5em;">
    <div>
        <label class="alert-success alert" hidden></label>
        <label class="alert-danger alert" hidden></label>
    </div>
    <div>
        <img src="uploads/<?= $product->photo ?>" alt="something gone wrong" width="300" height="500">
    </div>
    <div>
        <label class="title">Название: <?= $product->name ?></label>
    </div>
    <div>
        <label class="title">Описание: <?= $product->description ?></label>
    </div>
    <div>
        <label class="title">Цена: <?= $product->price ?></label>
    </div>
    <div>
        <button class="btn btn-success">Добавить в корзину</button>
    </div>
</div>

<?php

$js = <<<JS
let product_id = "$product->id";
    $('.btn').on('click', function() {
        $.ajax({
            url: 'index.php?r=product/add-product',
            type: 'POST',
            data: {id: product_id},
            success: function(res) {
                $('.alert-success').html(res.message).show();
            },
            error: function(res) {
                $('.alert-danger').text(res.message).show();
            }
        });
    });
JS;

$this->registerJs($js);
?>
