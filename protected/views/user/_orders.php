<table class="item-list__order">
    <thead>
    <tr class="item-list__order__row_head">
        <th class="item-list__order__cell item-list__order__cell_nr">Заказ</th>
        <th class="item-list__order__cell item-list__order__cell_date">Дата</th>
        <th class="item-list__order__cell item-list__order__cell_price">Сумма заказа</th>
        <th class="item-list__order__cell">Статус</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($orders as $order) :?>
        <tr>
            <td class="item-list__order__cell">
                <a href="/admin/order/update?id=<?= $order->id ?>" class="item-list__order__cell-link"><?= $order->id ?></a>
            </td>
            <td class="item-list__order__cell"><?= date("d.m.Y", strtotime($order->date_create)); ?></td>
            <td class="item-list__order__cell item-list__order__cell_price"><?= $order->total ?></td>
            <td class="item-list__order__cell"><?=Yii::app()->params['orderStatuses'][$order->status]?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>