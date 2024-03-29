<?php
namespace Clayful;

use Clayful\Clayful;

class Brand {

	public static $name = 'Brand';
	public static $path = 'brands';

	public static $apis = array(
		'count' => array(
			'modelName'      => 'Brand',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/brands/count',
			'params'         => array(),
		),
		'create' => array(
			'modelName'      => 'Brand',
			'methodName'     => 'create',
			'httpMethod'     => 'POST',
			'path'           => '/v1/brands',
			'params'         => array(),
		),
		'delete' => array(
			'modelName'      => 'Brand',
			'methodName'     => 'delete',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/brands/{brandId}',
			'params'         => array('brandId', ),
		),
		'deleteMetafield' => array(
			'modelName'      => 'Brand',
			'methodName'     => 'deleteMetafield',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/brands/{brandId}/meta/{field}',
			'params'         => array('brandId', 'field', ),
		),
		'get' => array(
			'modelName'      => 'Brand',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/brands/{brandId}',
			'params'         => array('brandId', ),
		),
		'increaseMetafield' => array(
			'modelName'      => 'Brand',
			'methodName'     => 'increaseMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/brands/{brandId}/meta/{field}/inc',
			'params'         => array('brandId', 'field', ),
		),
		'list' => array(
			'modelName'      => 'Brand',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/brands',
			'params'         => array(),
		),
		'pullFromMetafield' => array(
			'modelName'      => 'Brand',
			'methodName'     => 'pullFromMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/brands/{brandId}/meta/{field}/pull',
			'params'         => array('brandId', 'field', ),
		),
		'pushToMetafield' => array(
			'modelName'      => 'Brand',
			'methodName'     => 'pushToMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/brands/{brandId}/meta/{field}/push',
			'params'         => array('brandId', 'field', ),
		),
		'update' => array(
			'modelName'      => 'Brand',
			'methodName'     => 'update',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/brands/{brandId}',
			'params'         => array('brandId', ),
		),
		'query' => array(
			'modelName'      => 'Brand',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/brands',
			'params'         => array(),
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