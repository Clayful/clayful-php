<?php
namespace Clayful;

use Clayful\Clayful;

class Catalog {

	public static $name = 'Catalog';
	public static $path = 'catalogs';

	public static $apis = array(
		'count' => array(
			'modelName'      => 'Catalog',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/catalogs/count',
			'params'         => array(),
		),
		'create' => array(
			'modelName'      => 'Catalog',
			'methodName'     => 'create',
			'httpMethod'     => 'POST',
			'path'           => '/v1/catalogs',
			'params'         => array(),
		),
		'delete' => array(
			'modelName'      => 'Catalog',
			'methodName'     => 'delete',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/catalogs/{catalogId}',
			'params'         => array('catalogId', ),
		),
		'deleteMetafield' => array(
			'modelName'      => 'Catalog',
			'methodName'     => 'deleteMetafield',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/catalogs/{catalogId}/meta/{field}',
			'params'         => array('catalogId', 'field', ),
		),
		'get' => array(
			'modelName'      => 'Catalog',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/catalogs/{catalogId}',
			'params'         => array('catalogId', ),
		),
		'increaseMetafield' => array(
			'modelName'      => 'Catalog',
			'methodName'     => 'increaseMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/catalogs/{catalogId}/meta/{field}/inc',
			'params'         => array('catalogId', 'field', ),
		),
		'list' => array(
			'modelName'      => 'Catalog',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/catalogs',
			'params'         => array(),
		),
		'pullFromMetafield' => array(
			'modelName'      => 'Catalog',
			'methodName'     => 'pullFromMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/catalogs/{catalogId}/meta/{field}/pull',
			'params'         => array('catalogId', 'field', ),
		),
		'pushToMetafield' => array(
			'modelName'      => 'Catalog',
			'methodName'     => 'pushToMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/catalogs/{catalogId}/meta/{field}/push',
			'params'         => array('catalogId', 'field', ),
		),
		'update' => array(
			'modelName'      => 'Catalog',
			'methodName'     => 'update',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/catalogs/{catalogId}',
			'params'         => array('catalogId', ),
		),
		'query' => array(
			'modelName'      => 'Catalog',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/catalogs',
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