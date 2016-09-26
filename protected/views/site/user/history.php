<div class="lc">
    <?php $this->renderPartial('user/_user_menu'); ?>
    <div class="history table__column table__column_right">
        <div class="table__cell">
            <h1 class="account-header__title">Мои заказы</h1>
            <?php if(!empty($history)) :?>
                <table class="item-list__order__">
                    <thead>
                    <tr class="item-list__order____row_head">
                        <th class="item-list__order____cell item-list__order____cell_nr">Заказ</th>
                        <th class="item-list__order____cell item-list__order____cell_date">Дата</th>
                        <th class="item-list__order____cell item-list__order____cell_dest">Адресат</th>
                        <th class="item-list__order____cell item-list__order____cell_price">Сумма заказа</th>
                        <th class="item-list__order____cell">Статус</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($history as $order) :?>
                            <tr>
                                <td class="item-list__order____cell">
                                    <a href="/history/<?= $order->id ?>" class="item-list__order____cell-link"><?= $order->id ?></a>
                                </td>
                                <td class="item-list__order____cell"><?= date("d.m.Y", strtotime($order->date_create)); ?></td>
                                <td class="item-list__order____cell"><?= $order->addressee ?></td>
                                <td class="item-list__order____cell item-list__order____cell_price"><?= $order->total ?></td>
                                <td class="item-list__order____cell"><?=Yii::app()->params['orderStatuses'][$order->status]?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else :?>
                <div class="order_empty"><h3>У Вас пока нет заказов</h3></div>
            <?php endif; ?>
        </div>
    </div>
</div>