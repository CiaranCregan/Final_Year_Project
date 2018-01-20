<?php

define('SHOPPING_CART_COOKIE','MMfinalyearproj');
define('SHOPPING_CART_EXPIRE_DATE',time() + (86400 *30));
define('MONEY_CURRENCY', 'GBP');
define('MODE', 'TESTMODE');

if (MODE == 'TESTMODE') {
	define('SECRET_KEY', 'sk_test_fZSz98ENLjmOli2P3bDct31l');
	define('PUBLISH_KEY', 'pk_test_G6n6afCBeOt85e3qsTNcRfm2');
}
