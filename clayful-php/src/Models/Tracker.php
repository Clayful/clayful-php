<?php
namespace Clayful;

use Clayful\Clayful;

class Tracker {

	public static $name = 'Tracker';
	public static $path = '';

	public static $apis = array(
		'getByCustomerForMe' => array(
			'modelName'      => 'Tracker',
			'methodName'     => 'getByCustomerForMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/tracker',
			'params'         => array(),
		),
		'get' => array(
			'modelName'      => 'Tracker',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/trackers/{trackerId}',
			'params'         => array('trackerId', ),
		),
		'getByCustomer' => array(
			'modelName'      => 'Tracker',
			'methodName'     => 'getByCustomer',
			'httpMethod'     => 'GET',
			'path'           => '/v1/customers/{customerId}/tracker',
			'params'         => array('customerId', ),
		),
		'getForMe' => array(
			'modelName'      => 'Tracker',
			'methodName'     => 'getForMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/trackers/{trackerId}',
			'params'         => array('trackerId', ),
		),
		'getAsNonRegisteredForMe' => array(
			'modelName'      => 'Tracker',
			'methodName'     => 'getAsNonRegisteredForMe',
			'httpMethod'     => 'GET',
			'path'           => '/v1/me/non-registered/trackers/{trackerId}',
			'params'         => array('trackerId', ),
		),
		'create' => array(
			'modelName'      => 'Tracker',
			'methodName'     => 'create',
			'httpMethod'     => 'POST',
			'path'           => '/v1/trackers',
			'params'         => array(),
		),
		'createForMe' => array(
			'modelName'      => 'Tracker',
			'methodName'     => 'createForMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/trackers',
			'params'         => array(),
			'withoutPayload' => true,
		),
		'createAsNonRegisteredForMe' => array(
			'modelName'      => 'Tracker',
			'methodName'     => 'createAsNonRegisteredForMe',
			'httpMethod'     => 'POST',
			'path'           => '/v1/me/non-registered/trackers',
			'params'         => array(),
			'withoutPayload' => true,
		),
		'changeOwner' => array(
			'modelName'      => 'Tracker',
			'methodName'     => 'changeOwner',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/trackers/{trackerId}/customer',
			'params'         => array('trackerId', ),
		),
		'changeOwnerForMe' => array(
			'modelName'      => 'Tracker',
			'methodName'     => 'changeOwnerForMe',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/me/trackers/{trackerId}/customer',
			'params'         => array('trackerId', ),
			'withoutPayload' => true,
		),
		'delete' => array(
			'modelName'      => 'Tracker',
			'methodName'     => 'delete',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/trackers/{trackerId}',
			'params'         => array('trackerId', ),
		),
		'deleteForMe' => array(
			'modelName'      => 'Tracker',
			'methodName'     => 'deleteForMe',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/me/trackers/{trackerId}',
			'params'         => array('trackerId', ),
		),
		'deleteAsNonRegisteredForMe' => array(
			'modelName'      => 'Tracker',
			'methodName'     => 'deleteAsNonRegisteredForMe',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/me/non-registered/trackers/{trackerId}',
			'params'         => array('trackerId', ),
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