<?php
namespace Clayful;

use Clayful\Clayful;

class Coupon {

	public static $name = 'Coupon';
	public static $path = 'coupons';

	public static $apis = array(
		'addTotalAmount' => array(
			'modelName'      => 'Coupon',
			'methodName'     => 'addTotalAmount',
			'httpMethod'     => 'POST',
			'path'           => '/v1/coupons/{couponId}/amount/total',
			'params'         => array('couponId', ),
		),
		'count' => array(
			'modelName'      => 'Coupon',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/coupons/count',
			'params'         => array(),
		),
		'create' => array(
			'modelName'      => 'Coupon',
			'methodName'     => 'create',
			'httpMethod'     => 'POST',
			'path'           => '/v1/coupons',
			'params'         => array(),
		),
		'delete' => array(
			'modelName'      => 'Coupon',
			'methodName'     => 'delete',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/coupons/{couponId}',
			'params'         => array('couponId', ),
		),
		'deleteMetafield' => array(
			'modelName'      => 'Coupon',
			'methodName'     => 'deleteMetafield',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/coupons/{couponId}/meta/{field}',
			'params'         => array('couponId', 'field', ),
		),
		'get' => array(
			'modelName'      => 'Coupon',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/coupons/{couponId}',
			'params'         => array('couponId', ),
		),
		'increaseMetafield' => array(
			'modelName'      => 'Coupon',
			'methodName'     => 'increaseMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/coupons/{couponId}/meta/{field}/inc',
			'params'         => array('couponId', 'field', ),
		),
		'list' => array(
			'modelName'      => 'Coupon',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/coupons',
			'params'         => array(),
		),
		'pullFromMetafield' => array(
			'modelName'      => 'Coupon',
			'methodName'     => 'pullFromMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/coupons/{couponId}/meta/{field}/pull',
			'params'         => array('couponId', 'field', ),
		),
		'pushToMetafield' => array(
			'modelName'      => 'Coupon',
			'methodName'     => 'pushToMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/coupons/{couponId}/meta/{field}/push',
			'params'         => array('couponId', 'field', ),
		),
		'update' => array(
			'modelName'      => 'Coupon',
			'methodName'     => 'update',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/coupons/{couponId}',
			'params'         => array('couponId', ),
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