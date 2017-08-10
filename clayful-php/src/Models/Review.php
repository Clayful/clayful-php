<?php
namespace Clayful;

use Clayful\Clayful;

class Review {

	public static $name = 'Review';
	public static $path = 'products/reviews';

	public static $apis = array(
		'query' => array(
			'modelName'      => 'Review',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/products/reviews',
			'params'         => array(),
		),
		'list' => array(
			'modelName'      => 'Review',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/products/reviews',
			'params'         => array(),
		),
		'count' => array(
			'modelName'      => 'Review',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/products/reviews/count',
			'params'         => array(),
		),
		'get' => array(
			'modelName'      => 'Review',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/products/reviews/{reviewId}',
			'params'         => array('reviewId', ),
		),
		'queryByProduct' => array(
			'modelName'      => 'Review',
			'methodName'     => 'queryByProduct',
			'httpMethod'     => 'GET',
			'path'           => '/v1/products/{productId}/reviews',
			'params'         => array('productId', ),
		),
		'listByProduct' => array(
			'modelName'      => 'Review',
			'methodName'     => 'listByProduct',
			'httpMethod'     => 'GET',
			'path'           => '/v1/products/{productId}/reviews',
			'params'         => array('productId', ),
		),
		'queryByCustomer' => array(
			'modelName'      => 'Review',
			'methodName'     => 'queryByCustomer',
			'httpMethod'     => 'GET',
			'path'           => '/v1/customers/{customerId}/products/reviews',
			'params'         => array('customerId', ),
		),
		'listByCustomer' => array(
			'modelName'      => 'Review',
			'methodName'     => 'listByCustomer',
			'httpMethod'     => 'GET',
			'path'           => '/v1/customers/{customerId}/products/reviews',
			'params'         => array('customerId', ),
		),
		'create' => array(
			'modelName'      => 'Review',
			'methodName'     => 'create',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products/reviews',
			'params'         => array(),
		),
		'createAsMe' => array(
			'modelName'      => 'Review',
			'methodName'     => 'createAsMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/products/reviews',
			'params'         => array(),
		),
		'flag' => array(
			'modelName'      => 'Review',
			'methodName'     => 'flag',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products/reviews/{reviewId}/flag',
			'params'         => array('reviewId', ),
		),
		'flagAsMe' => array(
			'modelName'      => 'Review',
			'methodName'     => 'flagAsMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/products/reviews/{reviewId}/flag',
			'params'         => array('reviewId', ),
			'withoutPayload' => true,
		),
		'helped' => array(
			'modelName'      => 'Review',
			'methodName'     => 'helped',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products/reviews/{reviewId}/helped/{upDown}',
			'params'         => array('reviewId', 'upDown', ),
		),
		'cancelFlag' => array(
			'modelName'      => 'Review',
			'methodName'     => 'cancelFlag',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products/reviews/{reviewId}/flag/cancel',
			'params'         => array('reviewId', ),
		),
		'cancelFlagAsMe' => array(
			'modelName'      => 'Review',
			'methodName'     => 'cancelFlagAsMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/products/reviews/{reviewId}/flag/cancel',
			'params'         => array('reviewId', ),
			'withoutPayload' => true,
		),
		'helpedAsMe' => array(
			'modelName'      => 'Review',
			'methodName'     => 'helpedAsMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/products/reviews/{reviewId}/helped/{upDown}',
			'params'         => array('reviewId', 'upDown', ),
			'withoutPayload' => true,
		),
		'pushToMetafield' => array(
			'modelName'      => 'Review',
			'methodName'     => 'pushToMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products/reviews/{reviewId}/meta/{field}/push',
			'params'         => array('reviewId', 'field', ),
		),
		'pullFromMetafield' => array(
			'modelName'      => 'Review',
			'methodName'     => 'pullFromMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products/reviews/{reviewId}/meta/{field}/pull',
			'params'         => array('reviewId', 'field', ),
		),
		'cancelHelped' => array(
			'modelName'      => 'Review',
			'methodName'     => 'cancelHelped',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products/reviews/{reviewId}/helped/{upDown}/cancel',
			'params'         => array('reviewId', 'upDown', ),
		),
		'increaseMetafield' => array(
			'modelName'      => 'Review',
			'methodName'     => 'increaseMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products/reviews/{reviewId}/meta/{field}/inc',
			'params'         => array('reviewId', 'field', ),
		),
		'cancelHelpedAsMe' => array(
			'modelName'      => 'Review',
			'methodName'     => 'cancelHelpedAsMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/products/reviews/{reviewId}/helped/{upDown}/cancel',
			'params'         => array('reviewId', 'upDown', ),
			'withoutPayload' => true,
		),
		'update' => array(
			'modelName'      => 'Review',
			'methodName'     => 'update',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/products/reviews/{reviewId}',
			'params'         => array('reviewId', ),
		),
		'updateAsMe' => array(
			'modelName'      => 'Review',
			'methodName'     => 'updateAsMe',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/me/products/reviews/{reviewId}',
			'params'         => array('reviewId', ),
		),
		'updateAsCustomer' => array(
			'modelName'      => 'Review',
			'methodName'     => 'updateAsCustomer',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/customers/{customerId}/products/reviews/{reviewId}',
			'params'         => array('customerId', 'reviewId', ),
		),
		'delete' => array(
			'modelName'      => 'Review',
			'methodName'     => 'delete',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/products/reviews/{reviewId}',
			'params'         => array('reviewId', ),
		),
		'deleteAsMe' => array(
			'modelName'      => 'Review',
			'methodName'     => 'deleteAsMe',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/me/products/reviews/{reviewId}',
			'params'         => array('reviewId', ),
		),
		'deleteMetafield' => array(
			'modelName'      => 'Review',
			'methodName'     => 'deleteMetafield',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/products/reviews/{reviewId}/meta/{field}',
			'params'         => array('reviewId', 'field', ),
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