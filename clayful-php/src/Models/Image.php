<?php
namespace Clayful;

use Clayful\Clayful;

class Image {

	public static $name = 'Image';
	public static $path = 'images';

	public static $apis = array(
		'query' => array(
			'modelName'      => 'Image',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/images',
			'params'         => array(),
		),
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
		'create' => array(
			'modelName'      => 'Image',
			'methodName'     => 'create',
			'httpMethod'     => 'POST',
			'path'           => '/v1/images',
			'params'         => array(),
			'usesFormData'   => true,
		),
		'addToReviewAsMe' => array(
			'modelName'      => 'Image',
			'methodName'     => 'addToReviewAsMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/products/reviews/{reviewId}/images',
			'params'         => array('reviewId', ),
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
		'delete' => array(
			'modelName'      => 'Image',
			'methodName'     => 'delete',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/images/{imageId}',
			'params'         => array('imageId', ),
		),
		'deleteFromReviewAsMe' => array(
			'modelName'      => 'Image',
			'methodName'     => 'deleteFromReviewAsMe',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/me/products/reviews/{reviewId}/images/{imageId}',
			'params'         => array('reviewId', 'imageId', ),
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