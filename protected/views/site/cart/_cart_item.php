<li id="cart_item_<?= $cartItem->id; ?>" class="item-list__item<?php if(!$cartItem->photo->is_available) :?> item-list__item_out<?php endif; ?>">
    <?php $this->renderPartial($path.'cart/_cart_item_base', array('cartItem'=>$cartItem)); ?>
    <div class="item-list__item__cell item-list__item__cell_quantity" data-item-id="<?= $cartItem->id; ?>">
        <?php if($cartItem->photo->is_available) :?>
            <button class="button<?php if($cartItem->count==1):?> button_disabled<?php endif; ?> cart__change-quantity cart__change-quantity_decrease">
                <span class="button__progress"></span>
                <i class="button__icon"></i>
            </button>
            <span class="item-list__item__quantity"><?= $cartItem->count ?></span>
            <button class="button<?php if($cartItem->count== Yii::app()->params['maxItemCountInCart']) :?> button_disabled<?php endif; ?> cart__change-quantity cart__change-quantity_increase">
                <span class="button__progress"></span>
                <i class="button__icon"></i>
            </button>
        <?php endif; ?>
    </div>
    <button class="button button_icon remove" data-item-id="<?= $cartItem->id; ?>">
        <span class="button__progress"></span>
        <span class="button__title"><i class="button__icon"></i>Убрать из корзины</span>
    </button>
    <div class="item-list__item__cell item-list__item__cell_total">
        <?php if($cartItem->photo->is_available) :?><?= $cartItem->getSum()?><?php else :?>0<?php endif; ?>&nbsp;руб.
    </div>
</li>