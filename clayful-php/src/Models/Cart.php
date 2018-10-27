<?php
namespace Clayful;

use Clayful\Clayful;

class Cart {

	public static $name = 'Cart';
	public static $path = '';

	public static $apis = array(
		'countItemsForMe' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'countItemsForMe',
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
		'getForMe' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'getForMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/cart',
			'params'         => array(),
		),
		'getAsNonRegistered' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'getAsNonRegistered',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/non-registered/cart',
			'params'         => array(),
		),
		'get' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'get',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/{customerId}/cart',
			'params'         => array('customerId', ),
		),
		'addItemForMe' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'addItemForMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/cart/items',
			'params'         => array(),
		),
		'getAsNonRegisteredForMe' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'getAsNonRegisteredForMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/non-registered/cart',
			'params'         => array(),
		),
		'addItem' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'addItem',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/{customerId}/cart/items',
			'params'         => array('customerId', ),
		),
		'checkoutForMe' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'checkoutForMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/cart/checkout/{type}',
			'params'         => array('type', ),
		),
		'checkoutAsNonRegistered' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'checkoutAsNonRegistered',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/non-registered/cart/checkout/{type}',
			'params'         => array('type', ),
		),
		'checkout' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'checkout',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/{customerId}/cart/checkout/{type}',
			'params'         => array('customerId', 'type', ),
		),
		'checkoutAsNonRegisteredForMe' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'checkoutAsNonRegisteredForMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/non-registered/cart/checkout/{type}',
			'params'         => array('type', ),
		),
		'updateItemForMe' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'updateItemForMe',
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
		'emptyForMe' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'emptyForMe',
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
		'deleteItemForMe' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'deleteItemForMe',
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
		'clearForMe' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'clearForMe',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/me/cart/items',
			'params'         => array(),
		),
		'clear' => array(
			'modelName'      => 'Cart',
			'methodName'     => 'clear',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/customers/{customerId}/cart/items',
			'params'         => array('customerId', ),
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