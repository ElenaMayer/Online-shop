<div class="item-list__total item-list__total_threshold">
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
</div>
<?php if($model->total < Yii::app()->params['minOrderSum']) :?>
    <div class="item-list__total__price_error">
        <span>Минимальная сумма заказа - <?= Yii::app()->params['minOrderSum'] ?> руб.</span>
    </div>
<?php endif; ?>
<div class="item-list__separator"></div>
<div class="item-list__navigation">
    <a <?php if($model->total >= Yii::app()->params['minOrderSum']) :?>href="/order/<?= $model->id?>"<?php endif; ?> class="button button_blue button_big item-list__navigation__order <?php if($model->total < Yii::app()->params['minOrderSum']) :?>button_disabled<?php endif; ?>">
        <span class="button__title">Оформить заказ</span>
        <span class="button__progress"></span>
    </a>
</div>
<div class="item-list__separator"></div>
