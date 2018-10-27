<?php
namespace Clayful;

use Clayful\Clayful;

class Collection {

	public static $name = 'Collection';
	public static $path = 'collections';

	public static $apis = array(
		'list' => array(
			'modelName'      => 'Collection',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/collections',
			'params'         => array(),
		),
		'count' => array(
			'modelName'      => 'Collection',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/collections/count',
			'params'         => array(),
		),
		'get' => array(
			'modelName'      => 'Collection',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/collections/{collectionId}',
			'params'         => array('collectionId', ),
		),
		'pushToMetafield' => array(
			'modelName'      => 'Collection',
			'methodName'     => 'pushToMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/collections/{collectionId}/meta/{field}/push',
			'params'         => array('collectionId', 'field', ),
		),
		'increaseMetafield' => array(
			'modelName'      => 'Collection',
			'methodName'     => 'increaseMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/collections/{collectionId}/meta/{field}/inc',
			'params'         => array('collectionId', 'field', ),
		),
		'pullFromMetafield' => array(
			'modelName'      => 'Collection',
			'methodName'     => 'pullFromMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/collections/{collectionId}/meta/{field}/pull',
			'params'         => array('collectionId', 'field', ),
		),
		'deleteMetafield' => array(
			'modelName'      => 'Collection',
			'methodName'     => 'deleteMetafield',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/collections/{collectionId}/meta/{field}',
			'params'         => array('collectionId', 'field', ),
		),
		'query' => array(
			'modelName'      => 'Collection',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/collections',
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