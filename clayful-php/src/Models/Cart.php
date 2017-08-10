<?php
namespace Clayful;

use Clayful\Clayful;

class Cart {

	public static $name = 'Cart';
	public static $path = '';

	public static $apis = array(
		'countItemsAsMe' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'countItemsAsMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/cart/items/count',
			'params'         => array(),
		),
		'countItems' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'countItems',
			'httpMethod'     => 'GET',
			'path'           => '/v1/customers/{customerId}/cart/items/count',
			'params'         => array('customerId', ),
		),
		'getAsNonRegistered' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'getAsNonRegistered',
			'httpMethod'     => 'POST',
			'path'           => '/v1/cart',
			'params'         => array(),
		),
		'checkoutAsNonRegistered' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'checkoutAsNonRegistered',
			'httpMethod'     => 'POST',
			'path'           => '/v1/cart/checkout',
			'params'         => array(),
		),
		'getAsMe' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'getAsMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/cart',
			'params'         => array(),
		),
		'get' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'get',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/{customerId}/cart',
			'params'         => array('customerId', ),
		),
		'checkoutAsMe' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'checkoutAsMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/cart/checkout',
			'params'         => array(),
		),
		'addItemAsMe' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'addItemAsMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/cart/items',
			'params'         => array(),
		),
		'addItem' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'addItem',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/{customerId}/cart/items',
			'params'         => array('customerId', ),
		),
		'checkout' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'checkout',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/{customerId}/cart/checkout',
			'params'         => array('customerId', ),
		),
		'updateItemAsMe' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'updateItemAsMe',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/me/cart/items/{itemId}',
			'params'         => array('itemId', ),
		),
		'updateItem' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'updateItem',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/customers/{customerId}/cart/items/{itemId}',
			'params'         => array('customerId', 'itemId', ),
		),
		'emptyAsMe' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'emptyAsMe',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/me/cart/items',
			'params'         => array(),
		),
		'empty' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'empty',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/customers/{customerId}/cart/items',
			'params'         => array('customerId', ),
		),
		'deleteItemAsMe' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'deleteItemAsMe',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/me/cart/items/{itemId}',
			'params'         => array('itemId', ),
		),
		'deleteItem' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'deleteItem',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/customers/{customerId}/cart/items/{itemId}',
			'params'         => array('customerId', 'itemId', ),
		),
	);

	public static function __callStatic($name, $arguments) {

		$detail = self::$apis[$name];

		return Clayful::callAPI(array(
			'modelName'      => $detail['modelName'],
			'methodName'     => $detail['methodName'],
			'httpMethod'     => $detail['httpMethod'],
			'path'           => $detail['path'],
			'params'         => $detail['params'],
			'usesFormData'   => array_key_exists('usesFormData', $detail),
			'withoutPayload' => array_key_exists('withoutPayload', $detail),
			'args'           => $arguments
		));

	}

}