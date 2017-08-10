<?php
namespace Clayful;

use Clayful\Clayful;

class Subscription {

	public static $name = 'Subscription';
	public static $path = '';

	public static $apis = array(
		'query' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/subscriptions',
			'params'         => array(),
		),
		'list' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/subscriptions',
			'params'         => array(),
		),
		'count' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/subscriptions/count',
			'params'         => array(),
		),
		'get' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/subscriptions/{subscriptionId}',
			'params'         => array('subscriptionId', ),
		),
		'queryByCustomer' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'queryByCustomer',
			'httpMethod'     => 'GET',
			'path'           => '/v1/customers/{customerId}/subscriptions',
			'params'         => array('customerId', ),
		),
		'listByCustomer' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'listByCustomer',
			'httpMethod'     => 'GET',
			'path'           => '/v1/customers/{customerId}/subscriptions',
			'params'         => array('customerId', ),
		),
		'reject' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'reject',
			'httpMethod'     => 'POST',
			'path'           => '/v1/subscriptions/{subscriptionId}/reject',
			'params'         => array('subscriptionId', ),
		),
		'cancel' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'cancel',
			'httpMethod'     => 'POST',
			'path'           => '/v1/subscriptions/{subscriptionId}/cancel',
			'params'         => array('subscriptionId', ),
		),
		'start' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'start',
			'httpMethod'     => 'POST',
			'path'           => '/v1/subscriptions/{subscriptionId}/start',
			'params'         => array('subscriptionId', ),
			'withoutPayload' => true,
		),
		'delete' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'delete',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/subscriptions/{subscriptionId}',
			'params'         => array('subscriptionId', ),
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