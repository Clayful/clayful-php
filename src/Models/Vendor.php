<?php
namespace Clayful;

use Clayful\Clayful;

class Vendor {

	public static $name = 'Vendor';
	public static $path = 'vendors';

	public static $apis = array(
		'count' => array(
			'modelName'      => 'Vendor',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/vendors/count',
			'params'         => array(),
		),
		'create' => array(
			'modelName'      => 'Vendor',
			'methodName'     => 'create',
			'httpMethod'     => 'POST',
			'path'           => '/v1/vendors',
			'params'         => array(),
		),
		'delete' => array(
			'modelName'      => 'Vendor',
			'methodName'     => 'delete',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/vendors/{vendorId}',
			'params'         => array('vendorId', ),
		),
		'deleteMetafield' => array(
			'modelName'      => 'Vendor',
			'methodName'     => 'deleteMetafield',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/vendors/{vendorId}/meta/{field}',
			'params'         => array('vendorId', 'field', ),
		),
		'get' => array(
			'modelName'      => 'Vendor',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/vendors/{vendorId}',
			'params'         => array('vendorId', ),
		),
		'increaseMetafield' => array(
			'modelName'      => 'Vendor',
			'methodName'     => 'increaseMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/vendors/{vendorId}/meta/{field}/inc',
			'params'         => array('vendorId', 'field', ),
		),
		'list' => array(
			'modelName'      => 'Vendor',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/vendors',
			'params'         => array(),
		),
		'pullFromMetafield' => array(
			'modelName'      => 'Vendor',
			'methodName'     => 'pullFromMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/vendors/{vendorId}/meta/{field}/pull',
			'params'         => array('vendorId', 'field', ),
		),
		'pushToMetafield' => array(
			'modelName'      => 'Vendor',
			'methodName'     => 'pushToMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/vendors/{vendorId}/meta/{field}/push',
			'params'         => array('vendorId', 'field', ),
		),
		'update' => array(
			'modelName'      => 'Vendor',
			'methodName'     => 'update',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/vendors/{vendorId}',
			'params'         => array('vendorId', ),
		),
		'query' => array(
			'modelName'      => 'Vendor',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/vendors',
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