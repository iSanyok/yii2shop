<div style="margin-left: 5em;">
    <div>
        <label class="title"><?= $product->name ?></label>
    </div>
    <div>
        <label class="title"><?= $product->description ?></label>
    </div>
    <div>
        <label class="title"><?= $product->price ?></label>
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
                alert(window.location.pathname);
                console.log(res);
            },
            error: function() {
                alert('Error!');
            }
        });
    });
JS;

$this->registerJs($js);
?>
