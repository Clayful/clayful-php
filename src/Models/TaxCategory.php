<?php
namespace Clayful;

use Clayful\Clayful;

class TaxCategory {

	public static $name = 'TaxCategory';
	public static $path = 'taxes/categories';

	public static $apis = array(
		'count' => array(
			'modelName'      => 'TaxCategory',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/taxes/categories/count',
			'params'         => array(),
		),
		'get' => array(
			'modelName'      => 'TaxCategory',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/taxes/categories/{taxCategoryId}',
			'params'         => array('taxCategoryId', ),
		),
		'list' => array(
			'modelName'      => 'TaxCategory',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/taxes/categories',
			'params'         => array(),
		),
		'query' => array(
			'modelName'      => 'TaxCategory',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/taxes/categories',
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