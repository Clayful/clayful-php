<?php
namespace Clayful;

use Clayful\Clayful;

class Order {

	public static $name = 'Order';
	public static $path = 'orders';

	public static $apis = array(
		'list' => array(
			'modelName'      => 'Order',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/orders',
			'params'         => array(),
		),
		'listForMe' => array(
			'modelName'      => 'Order',
			'methodName'     => 'listForMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/orders',
			'params'         => array(),
		),
		'count' => array(
			'modelName'      => 'Order',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/orders/count',
			'params'         => array(),
		),
		'get' => array(
			'modelName'      => 'Order',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/orders/{orderId}',
			'params'         => array('orderId', ),
		),
		'countForMe' => array(
			'modelName'      => 'Order',
			'methodName'     => 'countForMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/orders/count',
			'params'         => array(),
		),
		'getForMe' => array(
			'modelName'      => 'Order',
			'methodName'     => 'getForMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/orders/{orderId}',
			'params'         => array('orderId', ),
		),
		'listBySubscription' => array(
			'modelName'      => 'Order',
			'methodName'     => 'listBySubscription',
			'httpMethod'     => 'GET',
			'path'           => '/v1/subscriptions/{subscriptionId}/orders',
			'params'         => array('subscriptionId', ),
		),
		'listBySubscriptionForMe' => array(
			'modelName'      => 'Order',
			'methodName'     => 'listBySubscriptionForMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/subscriptions/{subscriptionId}/orders',
			'params'         => array('subscriptionId', ),
		),
		'listInventoryOperations' => array(
			'modelName'      => 'Order',
			'methodName'     => 'listInventoryOperations',
			'httpMethod'     => 'GET',
			'path'           => '/v1/orders/{orderId}/inventory/operations',
			'params'         => array('orderId', ),
		),
		'markAsReceived' => array(
			'modelName'      => 'Order',
			'methodName'     => 'markAsReceived',
			'httpMethod'     => 'POST',
			'path'           => '/v1/orders/{orderId}/received',
			'params'         => array('orderId', ),
			'withoutPayload' => true,
		),
		'syncInventory' => array(
			'modelName'      => 'Order',
			'methodName'     => 'syncInventory',
			'httpMethod'     => 'POST',
			'path'           => '/v1/orders/{orderId}/synced',
			'params'         => array('orderId', ),
			'withoutPayload' => true,
		),
		'cancel' => array(
			'modelName'      => 'Order',
			'methodName'     => 'cancel',
			'httpMethod'     => 'POST',
			'path'           => '/v1/orders/{orderId}/cancellation',
			'params'         => array('orderId', ),
		),
		'createFulfillment' => array(
			'modelName'      => 'Order',
			'methodName'     => 'createFulfillment',
			'httpMethod'     => 'POST',
			'path'           => '/v1/orders/{orderId}/fulfillments',
			'params'         => array('orderId', ),
		),
		'authenticate' => array(
			'modelName'      => 'Order',
			'methodName'     => 'authenticate',
			'httpMethod'     => 'POST',
			'path'           => '/v1/orders/{orderId}/auth',
			'params'         => array('orderId', ),
		),
		'requestRefund' => array(
			'modelName'      => 'Order',
			'methodName'     => 'requestRefund',
			'httpMethod'     => 'POST',
			'path'           => '/v1/orders/{orderId}/refunds',
			'params'         => array('orderId', ),
		),
		'markAsDone' => array(
			'modelName'      => 'Order',
			'methodName'     => 'markAsDone',
			'httpMethod'     => 'POST',
			'path'           => '/v1/orders/{orderId}/done',
			'params'         => array('orderId', ),
			'withoutPayload' => true,
		),
		'requestRefundForMe' => array(
			'modelName'      => 'Order',
			'methodName'     => 'requestRefundForMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/orders/{orderId}/refunds',
			'params'         => array('orderId', ),
		),
		'markAsReceivedForMe' => array(
			'modelName'      => 'Order',
			'methodName'     => 'markAsReceivedForMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/orders/{orderId}/received',
			'params'         => array('orderId', ),
			'withoutPayload' => true,
		),
		'cancelForMe' => array(
			'modelName'      => 'Order',
			'methodName'     => 'cancelForMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/orders/{orderId}/cancellation',
			'params'         => array('orderId', ),
		),
		'checkTicket' => array(
			'modelName'      => 'Order',
			'methodName'     => 'checkTicket',
			'httpMethod'     => 'POST',
			'path'           => '/v1/orders/tickets/{code}/validity',
			'params'         => array('code', ),
		),
		'useTicket' => array(
			'modelName'      => 'Order',
			'methodName'     => 'useTicket',
			'httpMethod'     => 'POST',
			'path'           => '/v1/orders/tickets/{code}/used',
			'params'         => array('code', ),
			'withoutPayload' => true,
		),
		'acceptRefund' => array(
			'modelName'      => 'Order',
			'methodName'     => 'acceptRefund',
			'httpMethod'     => 'POST',
			'path'           => '/v1/orders/{orderId}/refunds/{refundId}/accepted',
			'params'         => array('orderId', 'refundId', ),
			'withoutPayload' => true,
		),
		'pushToMetafield' => array(
			'modelName'      => 'Order',
			'methodName'     => 'pushToMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/orders/{orderId}/meta/{field}/push',
			'params'         => array('orderId', 'field', ),
		),
		'cancelRefund' => array(
			'modelName'      => 'Order',
			'methodName'     => 'cancelRefund',
			'httpMethod'     => 'POST',
			'path'           => '/v1/orders/{orderId}/refunds/{refundId}/cancellation',
			'params'         => array('orderId', 'refundId', ),
		),
		'pullFromMetafield' => array(
			'modelName'      => 'Order',
			'methodName'     => 'pullFromMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/orders/{orderId}/meta/{field}/pull',
			'params'         => array('orderId', 'field', ),
		),
		'increaseMetafield' => array(
			'modelName'      => 'Order',
			'methodName'     => 'increaseMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/orders/{orderId}/meta/{field}/inc',
			'params'         => array('orderId', 'field', ),
		),
		'restockRefundItems' => array(
			'modelName'      => 'Order',
			'methodName'     => 'restockRefundItems',
			'httpMethod'     => 'POST',
			'path'           => '/v1/orders/{orderId}/refunds/{refundId}/restock',
			'params'         => array('orderId', 'refundId', ),
		),
		'registerPaymentMethod' => array(
			'modelName'      => 'Order',
			'methodName'     => 'registerPaymentMethod',
			'httpMethod'     => 'POST',
			'path'           => '/v1/orders/{orderId}/transactions/payments/methods',
			'params'         => array('orderId', ),
		),
		'cancelRefundForMe' => array(
			'modelName'      => 'Order',
			'methodName'     => 'cancelRefundForMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/orders/{orderId}/refunds/{refundId}/cancellation',
			'params'         => array('orderId', 'refundId', ),
		),
		'createDownloadUrl' => array(
			'modelName'      => 'Order',
			'methodName'     => 'createDownloadUrl',
			'httpMethod'     => 'POST',
			'path'           => '/v1/orders/{orderId}/items/{itemId}/download/url',
			'params'         => array('orderId', 'itemId', ),
			'withoutPayload' => true,
		),
		'restockAllRefundItems' => array(
			'modelName'      => 'Order',
			'methodName'     => 'restockAllRefundItems',
			'httpMethod'     => 'POST',
			'path'           => '/v1/orders/{orderId}/refunds/{refundId}/restock/all',
			'params'         => array('orderId', 'refundId', ),
			'withoutPayload' => true,
		),
		'createDownloadUrlForMe' => array(
			'modelName'      => 'Order',
			'methodName'     => 'createDownloadUrlForMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/orders/{orderId}/items/{itemId}/download/url',
			'params'         => array('orderId', 'itemId', ),
			'withoutPayload' => true,
		),
		'update' => array(
			'modelName'      => 'Order',
			'methodName'     => 'update',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/orders/{orderId}',
			'params'         => array('orderId', ),
		),
		'updateForMe' => array(
			'modelName'      => 'Order',
			'methodName'     => 'updateForMe',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/me/orders/{orderId}',
			'params'         => array('orderId', ),
		),
		'updateTransactions' => array(
			'modelName'      => 'Order',
			'methodName'     => 'updateTransactions',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/orders/{orderId}/transactions',
			'params'         => array('orderId', ),
		),
		'updateCancellation' => array(
			'modelName'      => 'Order',
			'methodName'     => 'updateCancellation',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/orders/{orderId}/cancellation',
			'params'         => array('orderId', ),
		),
		'updateTransactionsForMe' => array(
			'modelName'      => 'Order',
			'methodName'     => 'updateTransactionsForMe',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/me/orders/{orderId}/transactions',
			'params'         => array('orderId', ),
			'withoutPayload' => true,
		),
		'updateCancellationForMe' => array(
			'modelName'      => 'Order',
			'methodName'     => 'updateCancellationForMe',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/me/orders/{orderId}/cancellation',
			'params'         => array('orderId', ),
		),
		'updateFulfillment' => array(
			'modelName'      => 'Order',
			'methodName'     => 'updateFulfillment',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/orders/{orderId}/fulfillments/{fulfillmentId}',
			'params'         => array('orderId', 'fulfillmentId', ),
		),
		'updateRefund' => array(
			'modelName'      => 'Order',
			'methodName'     => 'updateRefund',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/orders/{orderId}/refunds/{refundId}',
			'params'         => array('orderId', 'refundId', ),
		),
		'updateItem' => array(
			'modelName'      => 'Order',
			'methodName'     => 'updateItem',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/orders/{orderId}/items/{itemId}',
			'params'         => array('orderId', 'itemId', ),
		),
		'updateRefundForMe' => array(
			'modelName'      => 'Order',
			'methodName'     => 'updateRefundForMe',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/me/orders/{orderId}/refunds/{refundId}',
			'params'         => array('orderId', 'refundId', ),
		),
		'updateRefundCancellation' => array(
			'modelName'      => 'Order',
			'methodName'     => 'updateRefundCancellation',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/orders/{orderId}/refunds/{refundId}/cancellation',
			'params'         => array('orderId', 'refundId', ),
		),
		'updateRefundCancellationForMe' => array(
			'modelName'      => 'Order',
			'methodName'     => 'updateRefundCancellationForMe',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/me/orders/{orderId}/refunds/{refundId}/cancellation',
			'params'         => array('orderId', 'refundId', ),
		),
		'delete' => array(
			'modelName'      => 'Order',
			'methodName'     => 'delete',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/orders/{orderId}',
			'params'         => array('orderId', ),
		),
		'markAsUndone' => array(
			'modelName'      => 'Order',
			'methodName'     => 'markAsUndone',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/orders/{orderId}/done',
			'params'         => array('orderId', ),
		),
		'markAsNotReceived' => array(
			'modelName'      => 'Order',
			'methodName'     => 'markAsNotReceived',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/orders/{orderId}/received',
			'params'         => array('orderId', ),
		),
		'markAsNotReceivedForMe' => array(
			'modelName'      => 'Order',
			'methodName'     => 'markAsNotReceivedForMe',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/me/orders/{orderId}/received',
			'params'         => array('orderId', ),
		),
		'deleteMetafield' => array(
			'modelName'      => 'Order',
			'methodName'     => 'deleteMetafield',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/orders/{orderId}/meta/{field}',
			'params'         => array('orderId', 'field', ),
		),
		'deleteRefund' => array(
			'modelName'      => 'Order',
			'methodName'     => 'deleteRefund',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/orders/{orderId}/refunds/{refundId}',
			'params'         => array('orderId', 'refundId', ),
		),
		'deleteFulfillment' => array(
			'modelName'      => 'Order',
			'methodName'     => 'deleteFulfillment',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/orders/{orderId}/fulfillments/{fulfillmentId}',
			'params'         => array('orderId', 'fulfillmentId', ),
		),
		'deleteInventoryOperation' => array(
			'modelName'      => 'Order',
			'methodName'     => 'deleteInventoryOperation',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/orders/{orderId}/inventory/operations/{operationId}',
			'params'         => array('orderId', 'operationId', ),
		),
		'unacceptRefund' => array(
			'modelName'      => 'Order',
			'methodName'     => 'unacceptRefund',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/orders/{orderId}/refunds/{refundId}/accepted',
			'params'         => array('orderId', 'refundId', ),
		),
		'unregisterPaymentMethod' => array(
			'modelName'      => 'Order',
			'methodName'     => 'unregisterPaymentMethod',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/orders/{orderId}/transactions/payments/methods/{paymentMethodId}',
			'params'         => array('orderId', 'paymentMethodId', ),
		),
		'query' => array(
			'modelName'      => 'Order',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/orders',
			'params'         => array(),
		),
		'queryForMe' => array(
			'modelName'      => 'Order',
			'methodName'     => 'queryForMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/orders',
			'params'         => array(),
		),
		'queryBySubscription' => array(
			'modelName'      => 'Order',
			'methodName'     => 'queryBySubscription',
			'httpMethod'     => 'GET',
			'path'           => '/v1/subscriptions/{subscriptionId}/orders',
			'params'         => array('subscriptionId', ),
		),
		'queryBySubscriptionForMe' => array(
			'modelName'      => 'Order',
			'methodName'     => 'queryBySubscriptionForMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/subscriptions/{subscriptionId}/orders',
			'params'         => array('subscriptionId', ),
		),
		'queryInventoryOperations' => array(
			'modelName'      => 'Order',
			'methodName'     => 'queryInventoryOperations',
			'httpMethod'     => 'GET',
			'path'           => '/v1/orders/{orderId}/inventory/operations',
			'params'         => array('orderId', ),
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