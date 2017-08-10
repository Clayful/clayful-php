<?php
namespace Clayful;

use Clayful\Clayful;

class WishList {

	public static $name = 'WishList';
	public static $path = 'wishlists';

	public static $apis = array(
		'query' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/wishlists',
			'params'         => array(),
		),
		'list' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/wishlists',
			'params'         => array(),
		),
		'queryAsMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'queryAsMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/wishlists',
			'params'         => array(),
		),
		'listAsMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'listAsMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/wishlists',
			'params'         => array(),
		),
		'count' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/wishlists/count',
			'params'         => array(),
		),
		'get' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/wishlists/{wishListId}',
			'params'         => array('wishListId', ),
		),
		'queryByCustomer' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'queryByCustomer',
			'httpMethod'     => 'GET',
			'path'           => '/v1/customers/{customerId}/wishlists',
			'params'         => array('customerId', ),
		),
		'listByCustomer' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'listByCustomer',
			'httpMethod'     => 'GET',
			'path'           => '/v1/customers/{customerId}/wishlists',
			'params'         => array('customerId', ),
		),
		'countAsMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'countAsMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/wishlists/count',
			'params'         => array(),
		),
		'getAsMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'getAsMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/wishlists/{wishListId}',
			'params'         => array('wishListId', ),
		),
		'queryProducts' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'queryProducts',
			'httpMethod'     => 'GET',
			'path'           => '/v1/wishlists/{wishListId}/products',
			'params'         => array('wishListId', ),
		),
		'listProducts' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'listProducts',
			'httpMethod'     => 'GET',
			'path'           => '/v1/wishlists/{wishListId}/products',
			'params'         => array('wishListId', ),
		),
		'queryProductsAsMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'queryProductsAsMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/wishlists/{wishListId}/products',
			'params'         => array('wishListId', ),
		),
		'listProductsAsMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'listProductsAsMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/wishlists/{wishListId}/products',
			'params'         => array('wishListId', ),
		),
		'countProducts' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'countProducts',
			'httpMethod'     => 'GET',
			'path'           => '/v1/wishlists/{wishListId}/products/count',
			'params'         => array('wishListId', ),
		),
		'countProductsAsMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'countProductsAsMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/wishlists/{wishListId}/products/count',
			'params'         => array('wishListId', ),
		),
		'create' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'create',
			'httpMethod'     => 'POST',
			'path'           => '/v1/wishlists',
			'params'         => array(),
		),
		'createAsMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'createAsMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/wishlists',
			'params'         => array(),
		),
		'addItem' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'addItem',
			'httpMethod'     => 'POST',
			'path'           => '/v1/wishlists/{wishListId}/items',
			'params'         => array('wishListId', ),
		),
		'addItemAsMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'addItemAsMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/wishlists/{wishListId}/items',
			'params'         => array('wishListId', ),
		),
		'increaseMetafield' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'increaseMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/wishlists/{wishListId}/meta/{field}/inc',
			'params'         => array('wishListId', 'field', ),
		),
		'pushToMetafield' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'pushToMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/wishlists/{wishListId}/meta/{field}/push',
			'params'         => array('wishListId', 'field', ),
		),
		'pullFromMetafield' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'pullFromMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/wishlists/{wishListId}/meta/{field}/pull',
			'params'         => array('wishListId', 'field', ),
		),
		'update' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'update',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/wishlists/{wishListId}',
			'params'         => array('wishListId', ),
		),
		'updateAsMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'updateAsMe',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/me/wishlists/{wishListId}',
			'params'         => array('wishListId', ),
		),
		'delete' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'delete',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/wishlists/{wishListId}',
			'params'         => array('wishListId', ),
		),
		'deleteAsMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'deleteAsMe',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/me/wishlists/{wishListId}',
			'params'         => array('wishListId', ),
		),
		'empty' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'empty',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/wishlists/{wishListId}/items',
			'params'         => array('wishListId', ),
		),
		'emptyAsMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'emptyAsMe',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/me/wishlists/{wishListId}/items',
			'params'         => array('wishListId', ),
		),
		'deleteItem' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'deleteItem',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/wishlists/{wishListId}/items/{productId}',
			'params'         => array('wishListId', 'productId', ),
		),
		'deleteMetafield' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'deleteMetafield',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/wishlists/{wishListId}/meta/{field}',
			'params'         => array('wishListId', 'field', ),
		),
		'deleteItemAsMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'deleteItemAsMe',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/me/wishlists/{wishListId}/items/{productId}',
			'params'         => array('wishListId', 'productId', ),
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