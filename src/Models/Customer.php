<?php
namespace Clayful;

use Clayful\Clayful;

class Customer {

	public static $name = 'Customer';
	public static $path = 'customers';

	public static $apis = array(
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
		'isAuthenticated' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'isAuthenticated',
			'httpMethod'     => 'GET',
			'path'           => '/v1/customers/auth',
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
		'listCouponsForMe' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'listCouponsForMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/coupons',
			'params'         => array(),
		),
		'listCoupons' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'listCoupons',
			'httpMethod'     => 'GET',
			'path'           => '/v1/customers/{customerId}/coupons',
			'params'         => array('customerId', ),
		),
		'countCouponsForMe' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'countCouponsForMe',
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
		'listByFlagVotes' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'listByFlagVotes',
			'httpMethod'     => 'GET',
			'path'           => '/v1/{voteModel}/{voteModelId}/flags/customers',
			'params'         => array('voteModel', 'voteModelId', ),
		),
		'listByHelpVotes' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'listByHelpVotes',
			'httpMethod'     => 'GET',
			'path'           => '/v1/{voteModel}/{voteModelId}/helped/{upDown}/customers',
			'params'         => array('voteModel', 'voteModelId', 'upDown', ),
		),
		'listByFlagVotes' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'listByFlagVotes',
			'httpMethod'     => 'GET',
			'path'           => '/v1/{voteModel}/{voteModelId}/flags/customers',
			'params'         => array('voteModel', 'voteModelId', ),
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
		'createMe' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'createMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me',
			'params'         => array(),
		),
		'authenticate' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'authenticate',
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
		'authenticateBy3rdParty' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'authenticateBy3rdParty',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/auth/{vendor}',
			'params'         => array('vendor', ),
		),
		'requestVerificationEmail' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'requestVerificationEmail',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/verifications/emails',
			'params'         => array(),
		),
		'requestVerification' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'requestVerification',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/verifications/{channelSlug}',
			'params'         => array('channelSlug', ),
		),
		'addCoupon' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'addCoupon',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/{customerId}/coupons',
			'params'         => array('customerId', ),
		),
		'verify' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'verify',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/{customerId}/verified',
			'params'         => array('customerId', ),
		),
		'recoverCredential' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'recoverCredential',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/credentials/{credentialField}/recoveries/{recoveryMethod}',
			'params'         => array('credentialField', 'recoveryMethod', ),
		),
		'increaseMetafield' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'increaseMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/{customerId}/meta/{field}/inc',
			'params'         => array('customerId', 'field', ),
		),
		'pullFromMetafield' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'pullFromMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/{customerId}/meta/{field}/pull',
			'params'         => array('customerId', 'field', ),
		),
		'pushToMetafield' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'pushToMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/customers/{customerId}/meta/{field}/push',
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
		'updateCredentialsForMe' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'updateCredentialsForMe',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/me/credentials',
			'params'         => array(),
		),
		'resetPassword' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'resetPassword',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/customers/{customerId}/password',
			'params'         => array('customerId', ),
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
		'deleteCouponForMe' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'deleteCouponForMe',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/me/coupons/{couponId}',
			'params'         => array('couponId', ),
		),
		'deleteCoupon' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'deleteCoupon',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/customers/{customerId}/coupons/{couponId}',
			'params'         => array('customerId', 'couponId', ),
		),
		'deleteMetafield' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'deleteMetafield',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/customers/{customerId}/meta/{field}',
			'params'         => array('customerId', 'field', ),
		),
		'query' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/customers',
			'params'         => array(),
		),
		'queryCouponsForMe' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'queryCouponsForMe',
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
		'queryByFlagVotes' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'queryByFlagVotes',
			'httpMethod'     => 'GET',
			'path'           => '/v1/{voteModel}/{voteModelId}/flags/customers',
			'params'         => array('voteModel', 'voteModelId', ),
		),
		'queryByHelpVotes' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'queryByHelpVotes',
			'httpMethod'     => 'GET',
			'path'           => '/v1/{voteModel}/{voteModelId}/helped/{upDown}/customers',
			'params'         => array('voteModel', 'voteModelId', 'upDown', ),
		),
		'queryByFlagVotes' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'queryByFlagVotes',
			'httpMethod'     => 'GET',
			'path'           => '/v1/{voteModel}/{voteModelId}/flags/customers',
			'params'         => array('voteModel', 'voteModelId', ),
		),
		'queryByHelpVotes' => array(
			'modelName'      => 'Customer',
			'methodName'     => 'queryByHelpVotes',
			'httpMethod'     => 'GET',
			'path'           => '/v1/{voteModel}/{voteModelId}/helped/{upDown}/customers',
			'params'         => array('voteModel', 'voteModelId', 'upDown', ),
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