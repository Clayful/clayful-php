<?php
namespace Clayful;

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Clayful\ClayfulResponse;
use Clayful\ClayfulException;

class Requester {

	public static $client;

	public static function client($c) {

		self::$client = $c;

	}

	public static function request($options) {

		$requestOptions = array(
			'query'       => $options['query'],
			'headers'     => $options['headers'],
			'http_errors' => false // manually handle 4xx, 5xx errors
		);

		if (array_key_exists('payload', $options) && $options['payload'] !== null) {

			if ($options['usesFormData'] === true) {
				// multipart/form-data
				// Ref: http://docs.guzzlephp.org/en/stable/request-options.html#multipart
				$requestOptions['multipart'] = $options['payload'];

			} else {
				// application/json
				// Ref: http://docs.guzzlephp.org/en/stable/request-options.html#json
				$requestOptions['json'] = $options['payload'];
			}

		}

		$response = self::$client->request(
			$options['httpMethod'],
			$options['requestUrl'],
			$requestOptions
		);

		$body = (string) $response->getBody();
		$body = empty($body) ? null : $body;

		$status = $response->getStatusCode();
		$data = empty($body) ? null : json_decode($body, true); // as array

		$headers = array_map(function($values) {
			return implode(', ', $values);
		}, $response->getHeaders());

		if ($status >= 400) {

			throw new ClayfulException(
				$options['modelName'],
				$options['methodName'],
				$status,
				$headers,
				array_key_exists('errorCode', $data) ? $data['errorCode'] : null,
				array_key_exists('message', $data) ? $data['message'] : null,
				array_key_exists('validation', $data) ? $data['validation'] : null
			);

		} else {

			return new ClayfulResponse($status, $data, $headers);

		}

	}

}

Requester::client(new Client());