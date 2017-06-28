<?php
namespace Clayful;

use Clayful\Requester;

class Clayful {

	public static $baseUrl = 'https://api.clayful.io';
	public static $defaultHeaders = array(
		'Accept-Encoding' => 'gzip',
		'X-Clayful-SDK'   => 'clayful-php'
	);
	public static $plugins = array(
		'request' => array('Clayful\Requester', 'request')
	);

	public static function optionsToHeaders($o = array()) {

		$headers = array();

		if (array_key_exists('language', $o)) {
			$headers['Accept-Language'] = $o['language'];
		}

		if (array_key_exists('currency', $o)) {
			$headers['Accept-Currency'] = $o['currency'];
		}

		if (array_key_exists('timeZone', $o)) {
			$headers['Accept-Time-Zone'] = $o['timeZone'];
		}

		if (array_key_exists('client', $o)) {
			$headers['Authorization'] = 'Bearer ' . $o['client'];
		}

		if (array_key_exists('customer', $o)) {
			$headers['X-Clayful-Customer-Authorization'] = 'Bearer ' . $o['customer'];
		}

		if (array_key_exists('errorLanguage', $o)) {
			$headers['X-Clayful-Error-Language'] = $o['errorLanguage'];
		}

		if (array_key_exists('headers', $o)) {
			$headers = array_merge($headers, $o['headers']);
		}

		return $headers;

	}

	public static function getEndPoint($path = '') {

		return self::$baseUrl . $path;

	}

	public static function extractRequestArguments($options) {

		$result = array(
			'httpMethod' => $options['httpMethod'],
			'payload'    => null,
			'query'      => array(),
			'headers'    => array(),
		);

		$rest = array_slice($options['args'], count($options['params']));

		$result['requestUrl'] = str_replace(array_map(function($param) {

			return '{' . $param . '}';

		}, $options['params']), $options['args'], $options['path']);

		if (($options['httpMethod'] === 'POST' ||
			$options['httpMethod'] === 'PUT') &&
			$options['withoutPayload'] === false) {

			$result['payload'] = array_shift($rest); // shift array to extract payload
		}

		$queryHeaders = array_shift($rest); // extract query & header options

		$queryHeaders = empty($queryHeaders) ?
							array('query' => array()) :
							$queryHeaders;

		$result['query'] = empty($queryHeaders['query']) ?
							array() :
							$queryHeaders['query'];

		$result['headers'] = self::optionsToHeaders($queryHeaders);

		return $result;

	}

	public static function callAPI($options) {

		$extracted = self::extractRequestArguments($options);
		$extracted = array_merge($extracted, array(
			'requestUrl'   => self::getEndPoint($extracted['requestUrl']),
			'modelName'    => $options['modelName'],
			'methodName'   => $options['methodName'],
			'usesFormData' => $options['usesFormData'],
		));
		$defaultHeaders = array_merge(array(), self::$defaultHeaders); // copy default headers
		$extracted['headers'] = array_merge($defaultHeaders, $extracted['headers']);

		return call_user_func(self::$plugins['request'], $extracted);

	}

	public static function config($options = array()) {

		self::$defaultHeaders = array_merge(self::$defaultHeaders, self::optionsToHeaders($options));

	}

	public static function install($plugin, $options) {

		self::$plugins[$plugin] = $options;

	}

}

