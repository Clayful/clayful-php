<?php
namespace Clayful;

use Clayful\Clayful;

class Image {

	public static $name = 'Image';
	public static $path = 'images';

	public static $apis = array(
		'list' => array(
			'modelName'      => 'Image',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/images',
			'params'         => array(),
		),
		'count' => array(
			'modelName'      => 'Image',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/images/count',
			'params'         => array(),
		),
		'get' => array(
			'modelName'      => 'Image',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/images/{imageId}',
			'params'         => array('imageId', ),
		),
		'listForMe' => array(
			'modelName'      => 'Image',
			'methodName'     => 'listForMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/images',
			'params'         => array(),
		),
		'countForMe' => array(
			'modelName'      => 'Image',
			'methodName'     => 'countForMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/images/count',
			'params'         => array(),
		),
		'getForMe' => array(
			'modelName'      => 'Image',
			'methodName'     => 'getForMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/images/{imageId}',
			'params'         => array('imageId', ),
		),
		'create' => array(
			'modelName'      => 'Image',
			'methodName'     => 'create',
			'httpMethod'     => 'POST',
			'path'           => '/v1/images',
			'params'         => array(),
			'usesFormData'   => true,
		),
		'createForMe' => array(
			'modelName'      => 'Image',
			'methodName'     => 'createForMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/images',
			'params'         => array(),
			'usesFormData'   => true,
		),
		'createAsCustomer' => array(
			'modelName'      => 'Image',
			'methodName'     => 'createAsCustomer',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/{customerId}/images',
			'params'         => array('customerId', ),
			'usesFormData'   => true,
		),
		'update' => array(
			'modelName'      => 'Image',
			'methodName'     => 'update',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/images/{imageId}',
			'params'         => array('imageId', ),
			'usesFormData'   => true,
		),
		'updateForMe' => array(
			'modelName'      => 'Image',
			'methodName'     => 'updateForMe',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/me/images/{imageId}',
			'params'         => array('imageId', ),
			'usesFormData'   => true,
		),
		'updateAsCustomer' => array(
			'modelName'      => 'Image',
			'methodName'     => 'updateAsCustomer',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/customers/{customerId}/images/{imageId}',
			'params'         => array('customerId', 'imageId', ),
			'usesFormData'   => true,
		),
		'delete' => array(
			'modelName'      => 'Image',
			'methodName'     => 'delete',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/images/{imageId}',
			'params'         => array('imageId', ),
		),
		'deleteForMe' => array(
			'modelName'      => 'Image',
			'methodName'     => 'deleteForMe',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/me/images/{imageId}',
			'params'         => array('imageId', ),
		),
		'deleteAsCustomer' => array(
			'modelName'      => 'Image',
			'methodName'     => 'deleteAsCustomer',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/customers/{customerId}/images/{imageId}',
			'params'         => array('customerId', 'imageId', ),
		),
		'query' => array(
			'modelName'      => 'Image',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/images',
			'params'         => array(),
		),
		'queryForMe' => array(
			'modelName'      => 'Image',
			'methodName'     => 'queryForMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/images',
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