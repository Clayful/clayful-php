<?php
namespace Clayful;

use Clayful\Clayful;

class OrderTag {

	public static $name = 'OrderTag';
	public static $path = 'orders/tags';

	public static $apis = array(
		'list' => array(
			'modelName'      => 'OrderTag',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/orders/tags',
			'params'         => array(),
		),
		'count' => array(
			'modelName'      => 'OrderTag',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/orders/tags/count',
			'params'         => array(),
		),
		'get' => array(
			'modelName'      => 'OrderTag',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/orders/tags/{orderTagId}',
			'params'         => array('orderTagId', ),
		),
		'query' => array(
			'modelName'      => 'OrderTag',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/orders/tags',
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