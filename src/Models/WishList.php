<?php
namespace Clayful;

use Clayful\Clayful;

class WishList {

	public static $name = 'WishList';
	public static $path = 'wishlists';

	public static $apis = array(
		'list' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/wishlists',
			'params'         => array(),
		),
		'listForMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'listForMe',
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
		'countForMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'countForMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/wishlists/count',
			'params'         => array(),
		),
		'getForMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'getForMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/wishlists/{wishListId}',
			'params'         => array('wishListId', ),
		),
		'listProducts' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'listProducts',
			'httpMethod'     => 'GET',
			'path'           => '/v1/wishlists/{wishListId}/products',
			'params'         => array('wishListId', ),
		),
		'listProductsForMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'listProductsForMe',
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
		'countProductsForMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'countProductsForMe',
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
		'createForMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'createForMe',
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
		'addItemForMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'addItemForMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/wishlists/{wishListId}/items',
			'params'         => array('wishListId', ),
		),
		'pullFromMetafield' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'pullFromMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/wishlists/{wishListId}/meta/{field}/pull',
			'params'         => array('wishListId', 'field', ),
		),
		'pushToMetafield' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'pushToMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/wishlists/{wishListId}/meta/{field}/push',
			'params'         => array('wishListId', 'field', ),
		),
		'increaseMetafield' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'increaseMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/wishlists/{wishListId}/meta/{field}/inc',
			'params'         => array('wishListId', 'field', ),
		),
		'update' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'update',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/wishlists/{wishListId}',
			'params'         => array('wishListId', ),
		),
		'updateForMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'updateForMe',
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
		'deleteForMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'deleteForMe',
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
		'emptyForMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'emptyForMe',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/me/wishlists/{wishListId}/items',
			'params'         => array('wishListId', ),
		),
		'deleteMetafield' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'deleteMetafield',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/wishlists/{wishListId}/meta/{field}',
			'params'         => array('wishListId', 'field', ),
		),
		'deleteItem' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'deleteItem',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/wishlists/{wishListId}/items/{productId}',
			'params'         => array('wishListId', 'productId', ),
		),
		'deleteItemForMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'deleteItemForMe',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/me/wishlists/{wishListId}/items/{productId}',
			'params'         => array('wishListId', 'productId', ),
		),
		'query' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/wishlists',
			'params'         => array(),
		),
		'queryForMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'queryForMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/wishlists',
			'params'         => array(),
		),
		'queryProducts' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'queryProducts',
			'httpMethod'     => 'GET',
			'path'           => '/v1/wishlists/{wishListId}/products',
			'params'         => array('wishListId', ),
		),
		'queryProductsForMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'queryProductsForMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/wishlists/{wishListId}/products',
			'params'         => array('wishListId', ),
		),
		'clear' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'clear',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/wishlists/{wishListId}/items',
			'params'         => array('wishListId', ),
		),
		'clearForMe' => array(
			'modelName'      => 'WishList',
			'methodName'     => 'clearForMe',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/me/wishlists/{wishListId}/items',
			'params'         => array('wishListId', ),
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