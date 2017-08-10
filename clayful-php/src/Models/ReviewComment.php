<?php
namespace Clayful;

use Clayful\Clayful;

class ReviewComment {

	public static $name = 'ReviewComment';
	public static $path = 'products/reviews/comments';

	public static $apis = array(
		'query' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/products/reviews/comments',
			'params'         => array(),
		),
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
		'queryByReview' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'queryByReview',
			'httpMethod'     => 'GET',
			'path'           => '/v1/products/reviews/{reviewId}/comments',
			'params'         => array('reviewId', ),
		),
		'listByReview' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'listByReview',
			'httpMethod'     => 'GET',
			'path'           => '/v1/products/reviews/{reviewId}/comments',
			'params'         => array('reviewId', ),
		),
		'queryByAuthor' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'queryByAuthor',
			'httpMethod'     => 'GET',
			'path'           => '/v1/{authorModel}/{authorId}/products/reviews/comments',
			'params'         => array('authorModel', 'authorId', ),
		),
		'listByAuthor' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'listByAuthor',
			'httpMethod'     => 'GET',
			'path'           => '/v1/{authorModel}/{authorId}/products/reviews/comments',
			'params'         => array('authorModel', 'authorId', ),
		),
		'create' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'create',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products/reviews/comments',
			'params'         => array(),
		),
		'createAsMe' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'createAsMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/products/reviews/comments',
			'params'         => array(),
		),
		'flag' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'flag',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products/reviews/comments/{reviewCommentId}/flag',
			'params'         => array('reviewCommentId', ),
		),
		'flagAsMe' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'flagAsMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/products/reviews/comments/{reviewCommentId}/flag',
			'params'         => array('reviewCommentId', ),
			'withoutPayload' => true,
		),
		'cancelFlag' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'cancelFlag',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products/reviews/comments/{reviewCommentId}/flag/cancel',
			'params'         => array('reviewCommentId', ),
		),
		'cancelFlagAsMe' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'cancelFlagAsMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/products/reviews/comments/{reviewCommentId}/flag/cancel',
			'params'         => array('reviewCommentId', ),
			'withoutPayload' => true,
		),
		'increaseMetafield' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'increaseMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products/reviews/comments/{reviewCommentId}/meta/{field}/inc',
			'params'         => array('reviewCommentId', 'field', ),
		),
		'pushToMetafield' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'pushToMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/products/reviews/comments/{reviewCommentId}/meta/{field}/push',
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
		'updateAsMe' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'updateAsMe',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/me/products/reviews/comments/{reviewCommentId}',
			'params'         => array('reviewCommentId', ),
		),
		'updateAsAuthor' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'updateAsAuthor',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/{authorModel}/{authorId}/products/reviews/comments/{reviewCommentId}',
			'params'         => array('authorModel', 'authorId', 'reviewCommentId', ),
		),
		'delete' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'delete',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/products/reviews/comments/{reviewCommentId}',
			'params'         => array('reviewCommentId', ),
		),
		'deleteAsMe' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'deleteAsMe',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/me/products/reviews/comments/{reviewCommentId}',
			'params'         => array('reviewCommentId', ),
		),
		'deleteMetafield' => array(
			'modelName'      => 'ReviewComment',
			'methodName'     => 'deleteMetafield',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/products/reviews/comments/{reviewCommentId}/meta/{field}',
			'params'         => array('reviewCommentId', 'field', ),
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