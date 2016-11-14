<div class="shipping">
    <h1>Доставка и оплата</h1>

    <h2>Как с нами связаться</h2>
    <p>Задать вопрос и уточнить интересующую Вас информацию можно несколькими способами:</p>
    <ul class="list list_shopping">
        <li class="list__item">Написать нам в <b>социальных сетях</b>.</li>
        <li class="list__item">Написать нам по электронной почте <b><a class="link" id="email">показать адрес</a></b>.</li>
    </ul>

    <div class="hint">
        <div class="hint__icon-payment"></div>
        <span class="hint__title">Оплата </br>при получении</span>
    </div>
<!--    <h2>Определение размера</h2>-->
<!--    <p>Вы можете определить размер по <a class="link" href="?size_tab"><b>таблице</b></a>.</p>-->

    <h2>Доставка и оплата</h2>
    <ul class="list list_shopping">
        <li class="list__item">После поступления заказа мы свяжемся с Вами по <b>телефону</b> или <b>электронной почте</b>.</li>
        <li class="list__item">После подтверждения заказа, мы вышлем заказ <b>в течении суток</b>.</li>
        <li class="list__item">Мы осуществляем доставку во все регионы России наложенным платежом.</li>
        <li class="list__item">Мы отправляем заказы бандеролью <b>1 класса.</b></li>
        <li class="list__item">Стоимость доставки расчитывается автоматически при оформлении заказа по тарифам Почты России.</li>
        <li class="list__item"><b>Оплата</b> производится на почте <b>в момент получения</b> посылки.</li>
        <li class="list__item"><b>Комиссия</b> за наложенный платеж состовляет <b>1% - 5%</b> и оплачивается при получении.</li>
        <li class="list__item">Минимальная сумма заказа <b><?= Yii::app()->params['minOrderSum']?> руб.</b></li>
    </ul>

    <div class="hint">
        <div class="hint__icon-shipping"></div>
        <span class="hint__title">Доставка во все</br>регионы России</br>1-м классом</span>
    </div>
    <h2>Возврат</h2>
    <ul class="list list_shopping">
        <li class="list__item">В случае брака мы <b>возвращаем полную стоимость</b> товара.</li>
    </ul>
</div>
<?php $this->renderPartial('_size_tab'); ?>
<script>
    $( "#email" ).on( "click", function() {
        $.ajax({
            url: '/ajax/getEmail',
            success: function(email){
                $("#email").parent().append('<a href="mailto:'+email+'" class="link">'+email+'</a>');
                $("#email").hide();
            }
        });
    });
</script>