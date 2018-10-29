<?php
namespace Clayful;

use Clayful\Clayful;

class Coupon {

	public static $name = 'Coupon';
	public static $path = 'coupons';

	public static $apis = array(
		'list' => array(
			'modelName'      => 'Coupon',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/coupons',
			'params'         => array(),
		),
		'count' => array(
			'modelName'      => 'Coupon',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/coupons/count',
			'params'         => array(),
		),
		'get' => array(
			'modelName'      => 'Coupon',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/coupons/{couponId}',
			'params'         => array('couponId', ),
		),
		'pullFromMetafield' => array(
			'modelName'      => 'Coupon',
			'methodName'     => 'pullFromMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/coupons/{couponId}/meta/{field}/pull',
			'params'         => array('couponId', 'field', ),
		),
		'increaseMetafield' => array(
			'modelName'      => 'Coupon',
			'methodName'     => 'increaseMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/coupons/{couponId}/meta/{field}/inc',
			'params'         => array('couponId', 'field', ),
		),
		'pushToMetafield' => array(
			'modelName'      => 'Coupon',
			'methodName'     => 'pushToMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/coupons/{couponId}/meta/{field}/push',
			'params'         => array('couponId', 'field', ),
		),
		'deleteMetafield' => array(
			'modelName'      => 'Coupon',
			'methodName'     => 'deleteMetafield',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/coupons/{couponId}/meta/{field}',
			'params'         => array('couponId', 'field', ),
		),
		'query' => array(
			'modelName'      => 'Coupon',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/coupons',
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