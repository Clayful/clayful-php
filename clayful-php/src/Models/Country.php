<?php
namespace Clayful;

use Clayful\Clayful;

class Country {

	public static $name = 'Country';
	public static $path = 'countries';

	public static $apis = array(
		'query' => array(
			'modelName'      => 'Country',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/countries',
			'params'         => array(),
		),
		'list' => array(
			'modelName'      => 'Country',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/countries',
			'params'         => array(),
		),
		'count' => array(
			'modelName'      => 'Country',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/countries/count',
			'params'         => array(),
		),
		'get' => array(
			'modelName'      => 'Country',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/countries/{countryId}',
			'params'         => array('countryId', ),
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