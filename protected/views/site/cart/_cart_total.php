<?php if($model->sale > 0) :?>
    <div class="item-list__total__price item-list__total__price_subtotal">
        <span class="item-list__total__price-title">Подытог</span>
        <span class="cart-subtotal-val"><?= $model->subtotal ?> руб.</span>
    </div>
    <div class="item-list__total__price item-list__total__price_discount">
        <span class="item-list__total__price-title">Скидка</span>
        <span class="cart-sale-val">- <?= $model->sale ?> руб.</span>
    </div>
<?php endif; ?>
<div class="item-list__total__price item-list__total__price_total">
    <span class="item-list__total__price-title">Итого</span>
    <span class="item-list__total-val"><?= $model->total ?> руб.</span>
</div>