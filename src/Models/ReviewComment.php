<?php
namespace Clayful;

use Clayful\Clayful;

class ReviewComment {

	public static $name = 'ReviewComment';
	public static $path = 'products/reviews/comments';

	public static $apis = array(
		'list' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/products/reviews/comments',
			'params'         => array(),
		),
		'count' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/products/reviews/comments/count',
			'params'         => array(),
		),
		'get' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/products/reviews/comments/{reviewCommentId}',
			'params'         => array('reviewCommentId', ),
		),
		'create' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'create',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products/reviews/comments',
			'params'         => array(),
		),
		'createForMe' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'createForMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/products/reviews/comments',
			'params'         => array(),
		),
		'flag' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'flag',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products/reviews/comments/{reviewCommentId}/flags',
			'params'         => array('reviewCommentId', ),
		),
		'flagForMe' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'flagForMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/products/reviews/comments/{reviewCommentId}/flags',
			'params'         => array('reviewCommentId', ),
			'withoutPayload' => true,
		),
		'pushToMetafield' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'pushToMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products/reviews/comments/{reviewCommentId}/meta/{field}/push',
			'params'         => array('reviewCommentId', 'field', ),
		),
		'increaseMetafield' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'increaseMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products/reviews/comments/{reviewCommentId}/meta/{field}/inc',
			'params'         => array('reviewCommentId', 'field', ),
		),
		'pullFromMetafield' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'pullFromMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products/reviews/comments/{reviewCommentId}/meta/{field}/pull',
			'params'         => array('reviewCommentId', 'field', ),
		),
		'update' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'update',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/products/reviews/comments/{reviewCommentId}',
			'params'         => array('reviewCommentId', ),
		),
		'updateForMe' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'updateForMe',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/me/products/reviews/comments/{reviewCommentId}',
			'params'         => array('reviewCommentId', ),
		),
		'delete' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'delete',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/products/reviews/comments/{reviewCommentId}',
			'params'         => array('reviewCommentId', ),
		),
		'deleteForMe' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'deleteForMe',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/me/products/reviews/comments/{reviewCommentId}',
			'params'         => array('reviewCommentId', ),
		),
		'cancelFlagForMe' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'cancelFlagForMe',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/me/products/reviews/comments/{reviewCommentId}/flags',
			'params'         => array('reviewCommentId', ),
		),
		'deleteMetafield' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'deleteMetafield',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/products/reviews/comments/{reviewCommentId}/meta/{field}',
			'params'         => array('reviewCommentId', 'field', ),
		),
		'cancelFlag' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'cancelFlag',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/products/reviews/comments/{reviewCommentId}/flags/{customerId}',
			'params'         => array('reviewCommentId', 'customerId', ),
		),
		'query' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/products/reviews/comments',
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