<?php
namespace Clayful;

use Clayful\Clayful;

class Brand {

	public static $name = 'Brand';
	public static $path = 'brands';

	public static $apis = array(
		'list' => array(
			'modelName'      => 'Brand',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/brands',
			'params'         => array(),
		),
		'count' => array(
			'modelName'      => 'Brand',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/brands/count',
			'params'         => array(),
		),
		'get' => array(
			'modelName'      => 'Brand',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/brands/{brandId}',
			'params'         => array('brandId', ),
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
		'increaseMetafield' => array(
			'modelName'      => 'Brand',
			'methodName'     => 'increaseMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/brands/{brandId}/meta/{field}/inc',
			'params'         => array('brandId', 'field', ),
		),
		'deleteMetafield' => array(
			'modelName'      => 'Brand',
			'methodName'     => 'deleteMetafield',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/brands/{brandId}/meta/{field}',
			'params'         => array('brandId', 'field', ),
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