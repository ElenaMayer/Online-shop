<?php if(!empty($model->cartItems)) :?>
    <div class="item-list">
        <div class="item-list__head">
            <div class="item-list__item__cell item-list__item__cell_description">Товар</div>
            <div class="item-list__item__cell item-list__item__cell_price">Стоимость</div>
            <div class="item-list__item__cell item-list__item__cell_quantity">Кол-во</div>
            <div class="item-list__item__cell item-list__item__cell_total">Итого</div>
        </div>
        <ul class="item-list__content">
            <?php foreach($model->cartItems as $cartItem) :?>
                <?php $this->renderPartial($path.'cart/_cart_item', array('cartItem'=>$cartItem, 'path'=>$path)); ?>
            <?php endforeach; ?>
        </ul>
        <div class="item-list__separator"></div>
        <div class="item-list__total item-list__total_threshold">
            <?php $this->renderPartial($path.'cart/_cart_total', array('model'=>$model)); ?>
        </div>
        <div class="item-list__separator"></div>
        <div class="item-list__navigation">
            <a href="/order/<?= $model->id?>" class="button button_blue button_big item-list__navigation__order">
                <span class="button__title">Оформить заказ</span>
                <span class="button__progress"></span>
            </a>
        </div>
        <div class="item-list__separator"></div>
    </div>
<?php else :?>
    <div class="cart__empty"><h2 class="h2">В корзину ничего не добавлено</h2></div>
<?php endif; ?>

<script>
    $( document ).ready(function() {
        $(".banner").show();
    });
    $( "body" ).on("mouseover", ".item-list__i_help", function() {$(this).children('.hint').addClass('hint-show')});
    $( "body" ).on("mouseleave", ".item-list__i_help", function() {$(this).children('.hint').removeClass('hint-show')});
    $( "body" ).on("click", ".cart__change-quantity", function() {
        if (!$(this).hasClass("button_disabled")) {
            item_id = $(this).parent().data("item-id");
            max_count = <?= Yii::app()->params['maxItemCountInCart']?>;
            if ($(this).hasClass('cart__change-quantity_increase'))
                action_name = "increase";
            else
                action_name = "decrease";
            $(this).parent().children('.cart__change-quantity_decrease').addClass('button_in-progress').addClass('button_disabled').prop( "disabled", true );
            $.ajax({
                url: "/ajax/changeCount",
                data: {
                    item_id: item_id,
                    action_name: action_name
                },
                type: "POST",
                dataType: "html",
                success: function (data) {
                    $('.button_in-progress').prop( "disabled", false ).removeClass('button_disabled').removeClass('button_in-progress');
                    if (data) {
                        $('.content').html(data);
                        updateCartCount();
                    }
                }
            });
        }
    });
    $( "body" ).on("click", "button.remove", function() {
        if (!$(this).hasClass("button_disabled")) {
            item_id = $(this).data("item-id");
            $(this).addClass('button_in-progress').addClass('button_disabled');
            $.ajax({
                url: "/ajax/deleteItemFromCart",
                data: {
                    item_id: item_id
                },
                type: "POST",
                dataType: "html",
                success: function (data) {
                    e = $('#cart_item_' + item_id)
                    if (data) {
                        e.hide('slow');
                        $('.item-list__total').html(data);
                        updateCartCount();
                    } else {
                        e.find('button.remove').removeClass('button_in-progress').removeClass('button_disabled');
                    }
                }
            });
        }
    });
    $( ".item-list__item" ).hover(
        function() {
            $(this).find('.cart__change-quantity_decrease').show();
            $(this).find('.cart__change-quantity_increase').show();
            $(this).find('.button_icon.remove').show();
        },
        function() {
            $(this).find('.cart__change-quantity_decrease').hide();
            $(this).find('.cart__change-quantity_increase').hide();
            $(this).find('.button_icon.remove').hide();
        }
    );
</script>