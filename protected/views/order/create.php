<h1>Добавить заказ <a href='<?php echo $this->createUrl('admin/order/index'); ?>' class="admin_title_link">Список</a></h1>

<?php $this->renderPartial('_form', array(
    'model'=>$model,
    'modelCartItem' => $modelCartItem)); ?>