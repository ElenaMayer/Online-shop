<?php
$this->pageTitle=Yii::app()->name;
?>
<div class="banners">
    <?php
    $this->widget(
        'booster.widgets.TbCarousel',
        array(
            'items' => array(
                array(
                    'image' => $this->bu('data/i/carousel_first.jpg'),
                ),
                array(
                    'image' => $this->bu('data/i/carousel_second.jpg'),
                ),
                array(
                    'image' => $this->bu('data/i/carousel_third.jpg'),
                ),
//                array(
//                    'image' => $this->bu('data/i/carousel_third.jpg?1'),
//                    'label' => 'Восточный стиль',
//                    'caption' => '<p>Одежда в восточном стиле - это прежде всего яркие цвета, натуральные материалы и необычные рисунки.</p>'
//                ),
            ),
        )
    );
    ?>
</div>

<div class="main-description">
    <div class="main-title">О нас</div>
    <p>Добро пожаловать в наш интернет-магазин уникальных украшений!</p>
    <p>У нас вы сможете не просто купить готовое украшение, а создать его по собственному вкусу и наполнить особым смыслом.</p>
    <p>Выберите медальон, затем выберите шармы и ваше украшение "расскажет" что вы любите, о чем переживаете или мечтаете.</p>
    <p>Ассортимент нашего магазина постоянно обновляется и пополняется новыми медальонами, шармами и цепочками на любой вкус и цвет.</p>
    <p>Зарегистрированные пользователи получают актуальную информацию об акциях и скидках на товары, а также персональные скидки.</p>
    <p>В нашем магазине, Вы без труда выберете интересный подарок с уникальной историей, который может стать интересным и очень приятным подарком для Вашего любимого человека, друга или члена Вашей семьи.</p>
    <p>Ваша дочь, жена, подруга или коллега будут приятно удивлены получив такой небольшой подарок на какой-нибудь праздник или просто пусть это будет небольшой сюрприз, подаренный им или себе просто "от души".</p>
</div>

<script>
    $(".carousel-inner div:first-child img").css('cursor', 'pointer');
    $(".carousel-inner div:first-child img").click(function(){
        window.location = "<?=Yii::app()->params['carouselUrl']['first']?>";
    });
    $(".carousel-inner div:nth-child(2) img").css('cursor', 'pointer');
    $(".carousel-inner div:nth-child(2) img").click(function(){
        window.location = "<?=Yii::app()->params['carouselUrl']['second']?>";
    });
    $(document).ready(function() {
        if (<?= isset($_GET['login']) ? 1 : 0;?> == 1) {
            jQuery('#auth_form').modal('show');
    } });

</script>