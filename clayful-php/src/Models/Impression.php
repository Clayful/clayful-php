<?php
namespace Clayful;

use Clayful\Clayful;

class Impression {

	public static $name = 'Impression';
	public static $path = '';

	public static $apis = array(
		'topBrands' => array(
			'modelName'      => 'Impression',
			'methodName'     => 'topBrands',
			'httpMethod'     => 'GET',
			'path'           => '/v1/impressions/{scope}/top/brands',
			'params'         => array('scope', ),
		),
		'topProducts' => array(
			'modelName'      => 'Impression',
			'methodName'     => 'topProducts',
			'httpMethod'     => 'GET',
			'path'           => '/v1/impressions/{scope}/top/products',
			'params'         => array('scope', ),
		),
		'topCollections' => array(
			'modelName'      => 'Impression',
			'methodName'     => 'topCollections',
			'httpMethod'     => 'GET',
			'path'           => '/v1/impressions/{scope}/top/collections',
			'params'         => array('scope', ),
		),
		'gather' => array(
			'modelName'      => 'Impression',
			'methodName'     => 'gather',
			'httpMethod'     => 'POST',
			'path'           => '/v1/impressions/{scope}',
			'params'         => array('scope', ),
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