<?php
namespace Clayful;

use Clayful\Clayful;

class Group {

	public static $name = 'Group';
	public static $path = 'groups';

	public static $apis = array(
		'count' => array(
			'modelName'      => 'Group',
			'methodName'     => 'count',
			'httpMethod'     => 'GET',
			'path'           => '/v1/groups/count',
			'params'         => array(),
		),
		'deleteMetafield' => array(
			'modelName'      => 'Group',
			'methodName'     => 'deleteMetafield',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/groups/{groupId}/meta/{field}',
			'params'         => array('groupId', 'field', ),
		),
		'get' => array(
			'modelName'      => 'Group',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/groups/{groupId}',
			'params'         => array('groupId', ),
		),
		'increaseMetafield' => array(
			'modelName'      => 'Group',
			'methodName'     => 'increaseMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/groups/{groupId}/meta/{field}/inc',
			'params'         => array('groupId', 'field', ),
		),
		'list' => array(
			'modelName'      => 'Group',
			'methodName'     => 'list',
			'httpMethod'     => 'GET',
			'path'           => '/v1/groups',
			'params'         => array(),
		),
		'pullFromMetafield' => array(
			'modelName'      => 'Group',
			'methodName'     => 'pullFromMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/groups/{groupId}/meta/{field}/pull',
			'params'         => array('groupId', 'field', ),
		),
		'pushToMetafield' => array(
			'modelName'      => 'Group',
			'methodName'     => 'pushToMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/groups/{groupId}/meta/{field}/push',
			'params'         => array('groupId', 'field', ),
		),
		'query' => array(
			'modelName'      => 'Group',
			'methodName'     => 'query',
			'httpMethod'     => 'GET',
			'path'           => '/v1/groups',
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