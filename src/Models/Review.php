<?php
namespace Clayful;

use Clayful\Clayful;

class Review {

	public static $name = 'Review';
	public static $path = 'products/reviews';

	public static $apis = array(
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
		'listPublished' => array(
			'modelName'      => 'Review',
			'methodName'     => 'listPublished',
			'httpMethod'     => 'GET',
			'path'           => '/v1/products/reviews/published',
			'params'         => array(),
		),
		'get' => array(
			'modelName'      => 'Review',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/products/reviews/{reviewId}',
			'params'         => array('reviewId', ),
		),
		'countPublished' => array(
			'modelName'      => 'Review',
			'methodName'     => 'countPublished',
			'httpMethod'     => 'GET',
			'path'           => '/v1/products/reviews/published/count',
			'params'         => array(),
		),
		'getPublished' => array(
			'modelName'      => 'Review',
			'methodName'     => 'getPublished',
			'httpMethod'     => 'GET',
			'path'           => '/v1/products/reviews/published/{reviewId}',
			'params'         => array('reviewId', ),
		),
		'create' => array(
			'modelName'      => 'Review',
			'methodName'     => 'create',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products/reviews',
			'params'         => array(),
		),
		'createForMe' => array(
			'modelName'      => 'Review',
			'methodName'     => 'createForMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/products/reviews',
			'params'         => array(),
		),
		'flag' => array(
			'modelName'      => 'Review',
			'methodName'     => 'flag',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products/reviews/{reviewId}/flags',
			'params'         => array('reviewId', ),
		),
		'flagForMe' => array(
			'modelName'      => 'Review',
			'methodName'     => 'flagForMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/products/reviews/{reviewId}/flags',
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
		'helpedForMe' => array(
			'modelName'      => 'Review',
			'methodName'     => 'helpedForMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/products/reviews/{reviewId}/helped/{upDown}',
			'params'         => array('reviewId', 'upDown', ),
			'withoutPayload' => true,
		),
		'increaseMetafield' => array(
			'modelName'      => 'Review',
			'methodName'     => 'increaseMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products/reviews/{reviewId}/meta/{field}/inc',
			'params'         => array('reviewId', 'field', ),
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
		'update' => array(
			'modelName'      => 'Review',
			'methodName'     => 'update',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/products/reviews/{reviewId}',
			'params'         => array('reviewId', ),
		),
		'updateForMe' => array(
			'modelName'      => 'Review',
			'methodName'     => 'updateForMe',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/me/products/reviews/{reviewId}',
			'params'         => array('reviewId', ),
		),
		'delete' => array(
			'modelName'      => 'Review',
			'methodName'     => 'delete',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/products/reviews/{reviewId}',
			'params'         => array('reviewId', ),
		),
		'deleteForMe' => array(
			'modelName'      => 'Review',
			'methodName'     => 'deleteForMe',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/me/products/reviews/{reviewId}',
			'params'         => array('reviewId', ),
		),
		'cancelFlagForMe' => array(
			'modelName'      => 'Review',
			'methodName'     => 'cancelFlagForMe',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/me/products/reviews/{reviewId}/flags',
			'params'         => array('reviewId', ),
		),
		'deleteMetafield' => array(
			'modelName'      => 'Review',
			'methodName'     => 'deleteMetafield',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/products/reviews/{reviewId}/meta/{field}',
			'params'         => array('reviewId', 'field', ),
		),
		'cancelFlag' => array(
			'modelName'      => 'Review',
			'methodName'     => 'cancelFlag',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/products/reviews/{reviewId}/flags/{customerId}',
			'params'         => array('reviewId', 'customerId', ),
		),
		'cancelHelpedForMe' => array(
			'modelName'      => 'Review',
			'methodName'     => 'cancelHelpedForMe',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/me/products/reviews/{reviewId}/helped/{upDown}',
			'params'         => array('reviewId', 'upDown', ),
		),
		'cancelHelped' => array(
			'modelName'      => 'Review',
			'methodName'     => 'cancelHelped',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/products/reviews/{reviewId}/helped/{upDown}/{customerId}',
			'params'         => array('reviewId', 'upDown', 'customerId', ),
		),
		'query' => array(
			'modelName'      => 'Review',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/products/reviews',
			'params'         => array(),
		),
		'queryPublished' => array(
			'modelName'      => 'Review',
			'methodName'     => 'queryPublished',
			'httpMethod'     => 'GET',
			'path'           => '/v1/products/reviews/published',
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