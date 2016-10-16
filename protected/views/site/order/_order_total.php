<div class="item-list__total__price item-list__total__price_subtotal">
    <span class="item-list__total__price-title">Подытог</span>
    <span class="cart-subtotal-val"><?= $model->subtotal ?> руб.</span>
</div>
<?php if($model->sale > 0) :?>
    <div class="item-list__total__price item-list__total__price_discount">
        <span class="item-list__total__price-title">Скидка</span>
        <span class="cart-sale-val">- <?= $model->sale ?> руб.</span>
    </div>
<?php endif; ?>
<div class="item-list__total__price item-list__total__price_amount">
        <span class="item-list__total__price-title">Доставка
<!--            <span class="item-list__total__price-hint item-list__i_help hint-wrap">-->
<!--                <div class="hint">При заказе от < Yii::app()->params['shippingFreeCountString']?><!-- позиций — доставка бесплатно-->
<!--                </div>-->
<!--            </span>-->
        </span>
    <span class="cart-shipping-val">
        <?php if(isset($shipping)) :?><?=$shipping?> руб.<?php else: ?>Для расчета введите индекс<?php endif; ?>
    </span>
</div>
<div class="item-list__total__price item-list__total__price_total">
    <span class="item-list__total__price-title">Итого</span>
    <div class="item-list__total-val">
        <span><?php if(isset($shipping)) :?><?=$model->total+$shipping?><?php else: ?><?= $model->total ?><?php endif; ?></span> руб.
    </div>
</div>