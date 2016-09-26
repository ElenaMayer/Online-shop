<a href="/<?= $cartItem->photo->category ?>/<?= $cartItem->photo->article ?>" class="item-list__item__cell item-list__item__cell_photo">
    <img src="<?= $cartItem->photo->getPreviewUrl(); ?>" class="item-list__item__photo">
</a>
<div class="item-list__item__cell item-list__item__cell_description">
    <div class="item-list__item__name"><?= $cartItem->photo->title ?> арт. <?= $cartItem->photo->article ?></div>
    <?php if($cartItem->size) :?>
        <div class="item-list__item__size">Размер: <?= $cartItem->size?></div>
    <?php endif; ?>
</div>
<?php if($cartItem->new_price) :?>
    <div class="item-list__item__cell item-list__item__cell_price"><?= $cartItem->new_price?>&nbsp;руб.
        <div class="item-list__item__old-price"><?= $cartItem->price?>&nbsp;руб.</div>
<?php else :?>
        <div class="item-list__item__cell item-list__item__cell_price"><?= $cartItem->price?>&nbsp;руб.
<?php endif; ?>
</div>
<div class="item-list__item__cell item-list__item__cell_quantity">
    <span class="item-list__item__quantity"><?= $cartItem->count ?></span>
</div>
<div class="item-list__item__cell item-list__item__cell_total">
    <?= $cartItem->new_price ? $cartItem->count * $cartItem->new_price : $cartItem->count * $cartItem->price ?>&nbsp;руб.
</div>