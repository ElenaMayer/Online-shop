<div id="data" class="catalog">
    <div class="table__left-column">
        <div class="js-fix_side_block  catalog-navigation-wrap">
            <div class="catalog-navigation__title">Категории</div>
            <ul class="catalog-navigation">
                <?php foreach (Yii::app()->params['categories'] as $categoryId => $categoryName): ?>
                    <li class="catalog-navigation__item">
                        <a class="catalog-navigation__link link <?php if($categoryId == $type):?> catalog-navigation__link_active<?php endif; ?>" href="/<?= $categoryId ?>"><?= $categoryName ?></a>
                        <span class="catalog-navigation__cnt"><?= Photo::model()->itemCountByCategory($categoryId) ?></span>
                        <?php if (isset(Yii::app()->params['subcategories'][$categoryId])): ?>
                            <ul class="catalog-navigation catalog-navigation_subtree<?php if($categoryId != $type):?> hidden<?php endif; ?>">
                                <?php foreach (Yii::app()->params['subcategories'][$categoryId] as $subcategoryId => $subcategoryName): ?>
                                    <?php if (Photo::model()->itemCountBySubcategory($subcategoryId) > 0): ?>
                                        <li class="catalog-navigation__item">
                                            <a class="catalog-navigation__link link<?php if(isset($_GET['subcategory']) && $_GET['subcategory'] == $subcategoryId):?> catalog-navigation__link_active<?php endif; ?>" href="/<?= $categoryId ?>?subcategory=<?= $subcategoryId ?>"><?= $subcategoryName ?></a>
                                            <span class="catalog-navigation__cnt"><?= Photo::model()->itemCountBySubcategory($subcategoryId) ?></span>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="table__right-column">
        <div class="multi-wrapper js-multi-wrapper">
            <div class="catalog__head">
        <!--        <div class="catalog__dd">-->
        <!--            <span>Сортировать:</span>-->
        <!--            --><?php //$this->widget('booster.widgets.TbButtonGroup', array(
        //                'buttons'=>array(
        //                    array('label'=>Yii::app()->session['catalog_order'], 'items'=>Photo::model()->getOrderList($type)),
        //                ),
        //                'htmlOptions'=>array('class'=>'catalog__order_menu')
        //            )); ?>
        <!--        </div>-->
        <!--        <div class="catalog__dd">-->
        <!--            <span>Выбрать размер:</span>-->
        <!--            --><?php //$this->widget('booster.widgets.TbButtonGroup', array(
        //                'buttons'=>array(
        //                    array('label'=>Yii::app()->session['catalog_size'], 'items'=>Photo::model()->getSizes()),
        //                ),
        //                'htmlOptions'=>array('class'=>'catalog__size_menu')
        //            )); ?>
        <!--        </div>-->
                <div class="title">
                    <h2><?php if (isset($_GET['subcategory'])):?><?= Yii::app()->params['subcategories'][$type][$_GET['subcategory']] ?><?php else: ?><?= Yii::app()->params['categories'][$type] ?><?php endif; ?></h2>
                    <span class="catalog__head-counter"><?= count($model) ?> товаров</span>
                </div>
            </div>
            <div class="catalog__data">
                <?php if(empty($model)): ?>
                    <div class="empty">К большому сожалению в этом разделе сейчас нет моделей <?= Yii::app()->session['catalog_size'] ?> размера :(</div>
                <?php else: ?>
                    <?php $this->renderPartial('catalog/_content', array('model'=>$model, 'type'=>$type)); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
    $( document ).ready(function() {
        $(".banner").show();
        $(".catalog__order_menu>ul.dropdown-menu>li").each(function( index ) {
            if ($(this).text().replace(/^\s+/, "") == '<?=Yii::app()->session['catalog_order']?>'.replace(/^\s+/, "")){
                $(this).addClass('active');
            }
        });
        $(".catalog__size_menu>ul.dropdown-menu>li").each(function( index ) {
            if ($(this).text().replace(/^\s+/, "") == '<?=Yii::app()->session['catalog_size']?>'.replace(/^\s+/, "")){
                $(this).addClass('active');
            }
        });
    });
    $( ".catalog__order_menu>ul.dropdown-menu>li>a" ).click(function() {
        order = $(this).text();
        a = $(this);
        $.ajax({
            url: '/<?= $type?>',
            data: {
                order: order
            },
            type: "GET",
            dataType : "html",
            success: function( data ) {
                $('#data').html(data);
            }});
    });
    $( ".catalog__size_menu>ul.dropdown-menu>li>a" ).click(function() {
        size = $(this).text();
        a = $(this);
        $.ajax({
            url: '/<?= $type?>',
            data: {
                size: size
            },
            type: "GET",
            dataType : "html",
            success: function( data ) {
                $('#data').html(data);
            }});
    });
</script>