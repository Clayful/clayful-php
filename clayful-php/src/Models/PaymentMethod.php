<?php
namespace Clayful;

use Clayful\Clayful;

class PaymentMethod {

	public static $name = 'PaymentMethod';
	public static $path = 'payments/methods';

	public static $apis = array(
		'query' => array(
			'modelName'      => 'PaymentMethod',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/payments/methods',
			'params'         => array(),
		),
		'list' => array(
			'modelName'      => 'PaymentMethod',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/payments/methods',
			'params'         => array(),
		),
		'count' => array(
			'modelName'      => 'PaymentMethod',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/payments/methods/count',
			'params'         => array(),
		),
		'get' => array(
			'modelName'      => 'PaymentMethod',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/payments/methods/{paymentMethodId}',
			'params'         => array('paymentMethodId', ),
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