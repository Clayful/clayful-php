<?php
namespace Clayful;

use Clayful\Clayful;

class Discount {

	public static $name = 'Discount';
	public static $path = 'discounts';

	public static $apis = array(
		'list' => array(
			'modelName'      => 'Discount',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/discounts',
			'params'         => array(),
		),
		'count' => array(
			'modelName'      => 'Discount',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/discounts/count',
			'params'         => array(),
		),
		'get' => array(
			'modelName'      => 'Discount',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/discounts/{discountId}',
			'params'         => array('discountId', ),
		),
		'pushToMetafield' => array(
			'modelName'      => 'Discount',
			'methodName'     => 'pushToMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/discounts/{discountId}/meta/{field}/push',
			'params'         => array('discountId', 'field', ),
		),
		'pullFromMetafield' => array(
			'modelName'      => 'Discount',
			'methodName'     => 'pullFromMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/discounts/{discountId}/meta/{field}/pull',
			'params'         => array('discountId', 'field', ),
		),
		'increaseMetafield' => array(
			'modelName'      => 'Discount',
			'methodName'     => 'increaseMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/discounts/{discountId}/meta/{field}/inc',
			'params'         => array('discountId', 'field', ),
		),
		'deleteMetafield' => array(
			'modelName'      => 'Discount',
			'methodName'     => 'deleteMetafield',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/discounts/{discountId}/meta/{field}',
			'params'         => array('discountId', 'field', ),
		),
		'query' => array(
			'modelName'      => 'Discount',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/discounts',
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