<?php
namespace Clayful;

use Clayful\Clayful;

class SubscriptionPlan {

	public static $name = 'SubscriptionPlan';
	public static $path = 'subscriptions/plans';

	public static $apis = array(
		'list' => array(
			'modelName'      => 'SubscriptionPlan',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/subscriptions/plans',
			'params'         => array(),
		),
		'count' => array(
			'modelName'      => 'SubscriptionPlan',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/subscriptions/plans/count',
			'params'         => array(),
		),
		'get' => array(
			'modelName'      => 'SubscriptionPlan',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/subscriptions/plans/{subscriptionPlanId}',
			'params'         => array('subscriptionPlanId', ),
		),
		'query' => array(
			'modelName'      => 'SubscriptionPlan',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/subscriptions/plans',
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