<?php
namespace Clayful;

use Clayful\Clayful;

class Downloadable {

	public static $name = 'Downloadable';
	public static $path = 'downloadables';

	public static $apis = array(
		'count' => array(
			'modelName'      => 'Downloadable',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/downloadables/count',
			'params'         => array(),
		),
		'createDownloadUrl' => array(
			'modelName'      => 'Downloadable',
			'methodName'     => 'createDownloadUrl',
			'httpMethod'     => 'POST',
			'path'           => '/v1/downloadables/{downloadableId}/url',
			'params'         => array('downloadableId', ),
			'withoutPayload' => true,
		),
		'get' => array(
			'modelName'      => 'Downloadable',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/downloadables/{downloadableId}',
			'params'         => array('downloadableId', ),
		),
		'list' => array(
			'modelName'      => 'Downloadable',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/downloadables',
			'params'         => array(),
		),
		'query' => array(
			'modelName'      => 'Downloadable',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/downloadables',
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