<?php
namespace Clayful;

use Clayful\Clayful;

class ShippingMethod {

	public static $name = 'ShippingMethod';
	public static $path = 'shipping/methods';

	public static $apis = array(
		'count' => array(
			'modelName'      => 'ShippingMethod',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/shipping/methods/count',
			'params'         => array(),
		),
		'get' => array(
			'modelName'      => 'ShippingMethod',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/shipping/methods/{shippingMethodId}',
			'params'         => array('shippingMethodId', ),
		),
		'list' => array(
			'modelName'      => 'ShippingMethod',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/shipping/methods',
			'params'         => array(),
		),
		'query' => array(
			'modelName'      => 'ShippingMethod',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/shipping/methods',
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