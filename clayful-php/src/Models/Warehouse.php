<?php
namespace Clayful;

use Clayful\Clayful;

class Warehouse {

	public static $name = 'Warehouse';
	public static $path = 'warehouses';

	public static $apis = array(
		'query' => array(
			'modelName'      => 'Warehouse',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/warehouses',
			'params'         => array(),
		),
		'list' => array(
			'modelName'      => 'Warehouse',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/warehouses',
			'params'         => array(),
		),
		'count' => array(
			'modelName'      => 'Warehouse',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/warehouses/count',
			'params'         => array(),
		),
		'get' => array(
			'modelName'      => 'Warehouse',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/warehouses/{warehouseId}',
			'params'         => array('warehouseId', ),
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