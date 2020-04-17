<?php
namespace Clayful;

use Clayful\Clayful;

class Subscription {

	public static $name = 'Subscription';
	public static $path = 'subscriptions';

	public static $apis = array(
		'list' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/subscriptions',
			'params'         => array(),
		),
		'listForMe' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'listForMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/subscriptions',
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
		'countForMe' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'countForMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/subscriptions/count',
			'params'         => array(),
		),
		'getForMe' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'getForMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/subscriptions/{subscriptionId}',
			'params'         => array('subscriptionId', ),
		),
		'listInventoryOperations' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'listInventoryOperations',
			'httpMethod'     => 'GET',
			'path'           => '/v1/subscriptions/{subscriptionId}/inventory/operations',
			'params'         => array('subscriptionId', ),
		),
		'markAsDone' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'markAsDone',
			'httpMethod'     => 'POST',
			'path'           => '/v1/subscriptions/{subscriptionId}/done',
			'params'         => array('subscriptionId', ),
			'withoutPayload' => true,
		),
		'authenticate' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'authenticate',
			'httpMethod'     => 'POST',
			'path'           => '/v1/subscriptions/{subscriptionId}/auth',
			'params'         => array('subscriptionId', ),
		),
		'syncInventory' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'syncInventory',
			'httpMethod'     => 'POST',
			'path'           => '/v1/subscriptions/{subscriptionId}/synced',
			'params'         => array('subscriptionId', ),
			'withoutPayload' => true,
		),
		'schedule' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'schedule',
			'httpMethod'     => 'POST',
			'path'           => '/v1/subscriptions/{subscriptionId}/scheduled',
			'params'         => array('subscriptionId', ),
		),
		'cancel' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'cancel',
			'httpMethod'     => 'POST',
			'path'           => '/v1/subscriptions/{subscriptionId}/cancellation',
			'params'         => array('subscriptionId', ),
		),
		'cancelForMe' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'cancelForMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/subscriptions/{subscriptionId}/cancellation',
			'params'         => array('subscriptionId', ),
		),
		'scheduleForMe' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'scheduleForMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/subscriptions/{subscriptionId}/scheduled',
			'params'         => array('subscriptionId', ),
		),
		'fulfillSchedule' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'fulfillSchedule',
			'httpMethod'     => 'POST',
			'path'           => '/v1/subscriptions/{subscriptionId}/schedules/orders',
			'params'         => array('subscriptionId', ),
		),
		'pullFromMetafield' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'pullFromMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/subscriptions/{subscriptionId}/meta/{field}/pull',
			'params'         => array('subscriptionId', 'field', ),
		),
		'increaseMetafield' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'increaseMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/subscriptions/{subscriptionId}/meta/{field}/inc',
			'params'         => array('subscriptionId', 'field', ),
		),
		'pushToMetafield' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'pushToMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/subscriptions/{subscriptionId}/meta/{field}/push',
			'params'         => array('subscriptionId', 'field', ),
		),
		'update' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'update',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/subscriptions/{subscriptionId}',
			'params'         => array('subscriptionId', ),
		),
		'updateForMe' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'updateForMe',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/me/subscriptions/{subscriptionId}',
			'params'         => array('subscriptionId', ),
		),
		'updateCancellation' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'updateCancellation',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/subscriptions/{subscriptionId}/cancellation',
			'params'         => array('subscriptionId', ),
		),
		'updateCancellationForMe' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'updateCancellationForMe',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/me/subscriptions/{subscriptionId}/cancellation',
			'params'         => array('subscriptionId', ),
		),
		'delete' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'delete',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/subscriptions/{subscriptionId}',
			'params'         => array('subscriptionId', ),
		),
		'markAsUndone' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'markAsUndone',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/subscriptions/{subscriptionId}/done',
			'params'         => array('subscriptionId', ),
		),
		'deleteMetafield' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'deleteMetafield',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/subscriptions/{subscriptionId}/meta/{field}',
			'params'         => array('subscriptionId', 'field', ),
		),
		'deleteInventoryOperation' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'deleteInventoryOperation',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/subscriptions/{subscriptionId}/inventory/operations/{operationId}',
			'params'         => array('subscriptionId', 'operationId', ),
		),
		'query' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/subscriptions',
			'params'         => array(),
		),
		'queryForMe' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'queryForMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/subscriptions',
			'params'         => array(),
		),
		'queryInventoryOperations' => array(
			'modelName'      => 'Subscription',
			'methodName'     => 'queryInventoryOperations',
			'httpMethod'     => 'GET',
			'path'           => '/v1/subscriptions/{subscriptionId}/inventory/operations',
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