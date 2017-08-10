<?php
namespace Clayful;

use Clayful\Clayful;

class Customer {

	public static $name = 'Customer';
	public static $path = 'customers';

	public static $apis = array(
		'query' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/customers',
			'params'         => array(),
		),
		'list' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/customers',
			'params'         => array(),
		),
		'getMe' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'getMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me',
			'params'         => array(),
		),
		'count' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/customers/count',
			'params'         => array(),
		),
		'get' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/customers/{customerId}',
			'params'         => array('customerId', ),
		),
		'queryCouponsAsMe' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'queryCouponsAsMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/coupons',
			'params'         => array(),
		),
		'listCouponsAsMe' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'listCouponsAsMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/coupons',
			'params'         => array(),
		),
		'queryCoupons' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'queryCoupons',
			'httpMethod'     => 'GET',
			'path'           => '/v1/customers/{customerId}/coupons',
			'params'         => array('customerId', ),
		),
		'listCoupons' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'listCoupons',
			'httpMethod'     => 'GET',
			'path'           => '/v1/customers/{customerId}/coupons',
			'params'         => array('customerId', ),
		),
		'queryByGroup' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'queryByGroup',
			'httpMethod'     => 'GET',
			'path'           => '/v1/groups/{groupId}/customers',
			'params'         => array('groupId', ),
		),
		'listByGroup' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'listByGroup',
			'httpMethod'     => 'GET',
			'path'           => '/v1/groups/{groupId}/customers',
			'params'         => array('groupId', ),
		),
		'countCouponsAsMe' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'countCouponsAsMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/coupons/count',
			'params'         => array(),
		),
		'countCoupons' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'countCoupons',
			'httpMethod'     => 'GET',
			'path'           => '/v1/customers/{customerId}/coupons/count',
			'params'         => array('customerId', ),
		),
		'queryByFlagVotes' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'queryByFlagVotes',
			'httpMethod'     => 'GET',
			'path'           => '/v1/{voteModel}/{voteModelId}/flagged/customers',
			'params'         => array('voteModel', 'voteModelId', ),
		),
		'listByFlagVotes' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'listByFlagVotes',
			'httpMethod'     => 'GET',
			'path'           => '/v1/{voteModel}/{voteModelId}/flagged/customers',
			'params'         => array('voteModel', 'voteModelId', ),
		),
		'queryByFlagVotes' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'queryByFlagVotes',
			'httpMethod'     => 'GET',
			'path'           => '/v1/{voteModel}/{voteModelId}/flagged/customers',
			'params'         => array('voteModel', 'voteModelId', ),
		),
		'listByFlagVotes' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'listByFlagVotes',
			'httpMethod'     => 'GET',
			'path'           => '/v1/{voteModel}/{voteModelId}/flagged/customers',
			'params'         => array('voteModel', 'voteModelId', ),
		),
		'queryByHelpVotes' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'queryByHelpVotes',
			'httpMethod'     => 'GET',
			'path'           => '/v1/{voteModel}/{voteModelId}/helped/{upDown}/customers',
			'params'         => array('voteModel', 'voteModelId', 'upDown', ),
		),
		'listByHelpVotes' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'listByHelpVotes',
			'httpMethod'     => 'GET',
			'path'           => '/v1/{voteModel}/{voteModelId}/helped/{upDown}/customers',
			'params'         => array('voteModel', 'voteModelId', 'upDown', ),
		),
		'queryByHelpVotes' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'queryByHelpVotes',
			'httpMethod'     => 'GET',
			'path'           => '/v1/{voteModel}/{voteModelId}/helped/{upDown}/customers',
			'params'         => array('voteModel', 'voteModelId', 'upDown', ),
		),
		'listByHelpVotes' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'listByHelpVotes',
			'httpMethod'     => 'GET',
			'path'           => '/v1/{voteModel}/{voteModelId}/helped/{upDown}/customers',
			'params'         => array('voteModel', 'voteModelId', 'upDown', ),
		),
		'create' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'create',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers',
			'params'         => array(),
		),
		'signup' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'signup',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me',
			'params'         => array(),
		),
		'auth' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'auth',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/auth',
			'params'         => array(),
		),
		'createVerification' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'createVerification',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/verifications',
			'params'         => array(),
		),
		'addCouponToCustomers' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'addCouponToCustomers',
			'httpMethod'     => 'POST',
			'path'           => '/v1/coupons/{couponId}/customers',
			'params'         => array('couponId', ),
		),
		'requestVerificationEmail' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'requestVerificationEmail',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/verifications/emails',
			'params'         => array(),
		),
		'verify' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'verify',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/{customerId}/verify',
			'params'         => array('customerId', ),
		),
		'addCoupon' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'addCoupon',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/{customerId}/coupons',
			'params'         => array('customerId', ),
		),
		'resetPassword' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'resetPassword',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/{customerId}/password/reset',
			'params'         => array('customerId', ),
		),
		'increaseMetafield' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'increaseMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/{customerId}/meta/{field}/inc',
			'params'         => array('customerId', 'field', ),
		),
		'pushToMetafield' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'pushToMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/{customerId}/meta/{field}/push',
			'params'         => array('customerId', 'field', ),
		),
		'pullFromMetafield' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'pullFromMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/{customerId}/meta/{field}/pull',
			'params'         => array('customerId', 'field', ),
		),
		'updateMe' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'updateMe',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/me',
			'params'         => array(),
		),
		'update' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'update',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/customers/{customerId}',
			'params'         => array('customerId', ),
		),
		'updateCredentialsAsMe' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'updateCredentialsAsMe',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/me/credentials',
			'params'         => array(),
		),
		'updateCredentials' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'updateCredentials',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/customers/{customerId}/credentials',
			'params'         => array('customerId', ),
		),
		'deleteMe' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'deleteMe',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/me',
			'params'         => array(),
		),
		'delete' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'delete',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/customers/{customerId}',
			'params'         => array('customerId', ),
		),
		'deleteCouponAsMe' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'deleteCouponAsMe',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/me/coupons/{couponId}',
			'params'         => array('couponId', ),
		),
		'deleteMetafield' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'deleteMetafield',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/customers/{customerId}/meta/{field}',
			'params'         => array('customerId', 'field', ),
		),
		'deleteCoupon' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'deleteCoupon',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/customers/{customerId}/coupons/{couponId}',
			'params'         => array('customerId', 'couponId', ),
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