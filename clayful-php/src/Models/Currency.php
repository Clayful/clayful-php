<?php
namespace Clayful;

use Clayful\Clayful;

class Currency {

	public static $name = 'Currency';
	public static $path = 'currencies';

	public static $apis = array(
		'list' => array(
			'modelName'      => 'Currency',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/currencies',
			'params'         => array(),
		),
		'count' => array(
			'modelName'      => 'Currency',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/currencies/count',
			'params'         => array(),
		),
		'get' => array(
			'modelName'      => 'Currency',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/currencies/{currencyId}',
			'params'         => array('currencyId', ),
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