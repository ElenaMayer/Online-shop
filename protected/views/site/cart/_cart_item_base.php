<a href="/<?= $cartItem->photo->category ?>/<?= $cartItem->photo->article ?>" class="item-list__item__cell item-list__item__cell_photo">
    <img src="<?= $cartItem->photo->getPreviewUrl(); ?>" class="item-list__item__photo">
</a>
<div class="item-list__item__cell item-list__item__cell_description">
    <div class="item-list__item__name"><?= $cartItem->photo->title ?> арт. <?= $cartItem->photo->article ?></div>
    <?php if($cartItem->size) :?>
        <div class="item-list__item__size">Размер: <?= $cartItem->size?></div>
    <?php endif; ?>
    <?php if(!$cartItem->photo->is_available) :?>
        <div class="item-list__item__extra-info">
            <span class="product-stock product-stock_wrapper">нет в наличии</span>
        </div>
    <?php endif; ?>

</div>

<?php if($cartItem->photo->is_sale) :?>
<div class="item-list__item__cell item-list__item__cell_price"><?= $cartItem->photo->price?>&nbsp;руб.
    <div class="item-list__item__old-price"><?= $cartItem->photo->old_price?>&nbsp;руб.</div>
    <?php else :?>
    <div class="item-list__item__cell item-list__item__cell_price"><?= $cartItem->photo->price?>&nbsp;руб.
        <?php endif; ?>
    </div>