<?php

class m140609_055733_create_db extends CDbMigration
{
	public function up()
	{

//        CREATE TABLE IF NOT EXISTS `tbl_migration` (
//        `version` varchar(255) NOT NULL,
//          `apply_time` int(11) DEFAULT NULL,
//          PRIMARY KEY (`version`)
//        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

        $this->createTable('user', array(
            'id' => 'pk',
            'username' => 'string',
            'password' => 'string',
            'name' => 'string',
            'surname' => 'string',
            'middlename' => 'string',
            'phone' => 'string',
            'address' => 'string',
            'postcode' => 'int',
            'email' => 'string',
            'date_of_birth' => 'date',
            'sex' => 'string',
            'is_subscribed' => 'boolean',
            'blocked' => 'boolean',
            'date_create' => 'datetime',
        ));
        $this->createTable('photo', array(
            'id' => 'pk',
            'img' => 'string',
            'category' => 'string',
            'subcategory' => 'string',
            'article' => 'string',
            'price' => 'int',
            'is_sale' => 'boolean',
            'sale' => 'string',
            'old_price' => 'int',
            'new_price' => 'int',
            'title' => 'string',
            'description' => 'text',
            'has_size' => 'boolean',
            'sizes' => 'string',
            'weight' => 'int',
            'is_show' => 'boolean',
            'is_new' => 'boolean',
            'is_available' => 'boolean DEFAULT true',
            'date_create' => 'date',
        ));

        $this->createTable('news', array(
            'id' => 'pk',
            'url' => 'string',
            'title' => 'string',
            'content' => 'text',
            'is_show' => 'boolean',
            'is_send_mail' => 'boolean',
            'date_publish' => 'date',
            'date_create' => 'date',
        ));
        $this->createTable('price', array(
            'id' => 'pk',
            'file' => 'string',
            'date_create' => 'date',
        ));
        $this->createTable('cart', array(
            'id' => 'pk',
            'user_id' => 'int',
            'is_active' => 'boolean NOT NULL DEFAULT true',
        ));
        $this->createTable('cart_item', array(
            'id' => 'pk',
            'cart_id' => 'int',
            'item_id' => 'int',
            'size' => 'string',
            'count' => 'int NOT NULL DEFAULT 1',
            'price' => 'int',
            'new_price' => 'int',
            'order_id' => 'bigint',
            'date_create' => 'datetime',
        ));
        $this->addForeignKey('FK_cart_user_id', 'cart', 'user_id', 'user', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('FK_cart_item_cart_id', 'cart_item', 'cart_id', 'cart', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('FK_cart_item_item_id', 'cart_item', 'item_id', 'photo', 'id', 'CASCADE', 'RESTRICT');
        // $todo order id not pk

        $this->createTable('order', array(
            'id' => 'bigint NOT NULL',
            'user_id' => 'int',
            'status' => 'string',
            'is_paid' => 'boolean',
            'shipping_method' => 'string',
            'payment_method' => 'string',
            'postcode' => 'int',
            'addressee' => 'string',
            'address' => 'string',
            'subtotal' => 'int',
            'sale' => 'int',
            'shipping' => 'int',
            'total' => 'int',
            'track_code' => 'string',
            'phone' => 'string',
            'email' => 'string',
            'date_create' => 'datetime',
        ));
        $this->addForeignKey('FK_order_user_id', 'order', 'user_id', 'user', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('FK_cart_item_order_id', 'cart_item', 'order_id', 'order', 'id', 'CASCADE', 'RESTRICT');
//        $this->createTable('mail_log', array(
//            'id' => 'pk',
//            'email' => 'string',
//            'action' => 'string',
//            'send_date' => 'date',
//        ));
//        $this->createTable('utm', array(
//            'id' => 'pk',
//            'utm_source' => 'string',
//            'utm_medium' => 'string',
//            'utm_campaign' => 'string',
//            'utm_term' => 'string',
//            'utm_content' => 'string',
//            'date_create' => 'datetime',
//        ));
    }

	public function down()
	{
		echo "m140609_055733_create_db does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}