<?php
namespace Clayful;

use Clayful\Clayful;

class ShippingPolicy {

	public static $name = 'ShippingPolicy';
	public static $path = 'shipping/policies';

	public static $apis = array(
		'count' => array(
			'modelName'      => 'ShippingPolicy',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/shipping/policies/count',
			'params'         => array(),
		),
		'get' => array(
			'modelName'      => 'ShippingPolicy',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/shipping/policies/{shippingPolicyId}',
			'params'         => array('shippingPolicyId', ),
		),
		'list' => array(
			'modelName'      => 'ShippingPolicy',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/shipping/policies',
			'params'         => array(),
		),
		'query' => array(
			'modelName'      => 'ShippingPolicy',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/shipping/policies',
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