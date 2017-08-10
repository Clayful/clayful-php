<?php
namespace Clayful;

use Clayful\Clayful;

class Product {

	public static $name = 'Product';
	public static $path = 'products';

	public static $apis = array(
		'query' => array(
			'modelName'      => 'Product',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/products',
			'params'         => array(),
		),
		'list' => array(
			'modelName'      => 'Product',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/products',
			'params'         => array(),
		),
		'count' => array(
			'modelName'      => 'Product',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/products/count',
			'params'         => array(),
		),
		'get' => array(
			'modelName'      => 'Product',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/products/{productId}',
			'params'         => array('productId', ),
		),
		'queryByBrand' => array(
			'modelName'      => 'Product',
			'methodName'     => 'queryByBrand',
			'httpMethod'     => 'GET',
			'path'           => '/v1/brands/{brandId}/products',
			'params'         => array('brandId', ),
		),
		'listByBrand' => array(
			'modelName'      => 'Product',
			'methodName'     => 'listByBrand',
			'httpMethod'     => 'GET',
			'path'           => '/v1/brands/{brandId}/products',
			'params'         => array('brandId', ),
		),
		'queryByCollection' => array(
			'modelName'      => 'Product',
			'methodName'     => 'queryByCollection',
			'httpMethod'     => 'GET',
			'path'           => '/v1/collections/{collectionId}/products',
			'params'         => array('collectionId', ),
		),
		'listByCollection' => array(
			'modelName'      => 'Product',
			'methodName'     => 'listByCollection',
			'httpMethod'     => 'GET',
			'path'           => '/v1/collections/{collectionId}/products',
			'params'         => array('collectionId', ),
		),
		'create' => array(
			'modelName'      => 'Product',
			'methodName'     => 'create',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products',
			'params'         => array(),
		),
		'createVariant' => array(
			'modelName'      => 'Product',
			'methodName'     => 'createVariant',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products/{productId}/variants',
			'params'         => array('productId', ),
		),
		'increaseMetafield' => array(
			'modelName'      => 'Product',
			'methodName'     => 'increaseMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products/{productId}/meta/{field}/inc',
			'params'         => array('productId', 'field', ),
		),
		'pullFromMetafield' => array(
			'modelName'      => 'Product',
			'methodName'     => 'pullFromMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products/{productId}/meta/{field}/pull',
			'params'         => array('productId', 'field', ),
		),
		'createVariation' => array(
			'modelName'      => 'Product',
			'methodName'     => 'createVariation',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products/{productId}/options/{optionId}/variations',
			'params'         => array('productId', 'optionId', ),
		),
		'pushToMetafield' => array(
			'modelName'      => 'Product',
			'methodName'     => 'pushToMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products/{productId}/meta/{field}/push',
			'params'         => array('productId', 'field', ),
		),
		'update' => array(
			'modelName'      => 'Product',
			'methodName'     => 'update',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/products/{productId}',
			'params'         => array('productId', ),
		),
		'updateVariant' => array(
			'modelName'      => 'Product',
			'methodName'     => 'updateVariant',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/products/{productId}/variants/{variantId}',
			'params'         => array('productId', 'variantId', ),
		),
		'updateOption' => array(
			'modelName'      => 'Product',
			'methodName'     => 'updateOption',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/products/{productId}/options/{optionId}',
			'params'         => array('productId', 'optionId', ),
		),
		'updateVariation' => array(
			'modelName'      => 'Product',
			'methodName'     => 'updateVariation',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/products/{productId}/options/{optionId}/variations/{variationId}',
			'params'         => array('productId', 'optionId', 'variationId', ),
		),
		'delete' => array(
			'modelName'      => 'Product',
			'methodName'     => 'delete',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/products/{productId}',
			'params'         => array('productId', ),
		),
		'deleteVariant' => array(
			'modelName'      => 'Product',
			'methodName'     => 'deleteVariant',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/products/{productId}/variants/{variantId}',
			'params'         => array('productId', 'variantId', ),
		),
		'deleteMetafield' => array(
			'modelName'      => 'Product',
			'methodName'     => 'deleteMetafield',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/products/{productId}/meta/{field}',
			'params'         => array('productId', 'field', ),
		),
		'deleteVariation' => array(
			'modelName'      => 'Product',
			'methodName'     => 'deleteVariation',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/products/{productId}/options/{optionId}/variations/{variationId}',
			'params'         => array('productId', 'optionId', 'variationId', ),
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