<?php
namespace Clayful\Tests;

use Clayful\Clayful;
use Clayful\ClayfulException;

class MockRequester {

	public $returnValue = null;

	public function __construct($returnValue) {

		$this->returnValue = $returnValue;

	}

	public function request($options) {

		if (is_a($this->returnValue, 'Exception')) {
			throw $this->returnValue;
		} else {
			return $this->returnValue;
		}

	}

}

class ClayfulTest extends \PHPUnit_Framework_TestCase {

	public function setUp() {

		Clayful::$listeners['request'] = array();
		Clayful::$listeners['response'] = array();

	}

	public function testDefaultOptions() {

		$this->assertEquals(Clayful::$baseUrl, 'https://api.clayful.io');
		$this->assertEquals(Clayful::$defaultHeaders, array(
			'Accept-Encoding' => 'gzip',
			'X-Clayful-SDK'   => 'clayful-php'
		));
		$this->assertEquals(Clayful::$plugins, array(
			'request' => array('Clayful\Requester', 'request')
		));

	}

	public function testConvertEmptyOptionsToEmptyHeaders() {

		$this->assertEquals(Clayful::optionsToHeaders(array()), array());

	}

	public function testConvertOptionsToEmptyHeaders() {

		$this->assertEquals(Clayful::optionsToHeaders(array(
			'language'      => 'ko',
			'currency'      => 'KRW',
			'timeZone'      => 'Asia/Seoul',
			'client'        => 'client_token',
			'customer'      => 'customer_token',
			'errorLanguage' => 'en',
			'headers'       => array(
				'X-Extra' => 'Extra'
			)
 		)), array(
			'Accept-Language'          => 'ko',
			'Accept-Currency'          => 'KRW',
			'Accept-Time-Zone'         => 'Asia/Seoul',
			'Authorization'            => 'Bearer client_token',
			'X-Clayful-Customer'       => 'customer_token',
			'X-Clayful-Error-Language' => 'en',
			'X-Extra'                  => 'Extra'
		));

	}

	public function testGetAPIEndpoint() {

		$this->assertEquals(Clayful::getEndPoint('/v1/products'), Clayful::$baseUrl . '/v1/products');

	}

	public function testNormalizeQueryValues() {

		$result = Clayful::normalizeQueryValues(array(
			'string'  => 'string',
			'number'  => 100,
			'boolean' => true,
			'special' => ' +&',
		));

		$this->assertEquals($result, array(
			'string'  => 'string',
			'number'  => '100',
			'boolean' => 'true',
			'special' => '%20%2B%26',
		));

	}

	public function testExtractAPIArguments() {

		function buildGetDeleteTestCases($method) {

			return array(
				array(
					'options' => array(
						'httpMethod'     => $method,
						'path'           => '/v1/products', // no params
						'params'         => array(),
						'withoutPayload' => false,
						'args'           => array() // no args
					),
					'result'  => array(
						'httpMethod'     => $method,
						'requestUrl'     => '/v1/products',
						'payload'        => null,
						'query'          => array(),
						'headers'        => array(),
						'meta'           => array(),
					)
				),
				array(
					'options' => array(
						'httpMethod'     => $method,
						'path'           => '/v1/products/{productId}',
						'params'         => array('productId'),
						'withoutPayload' => false,
						'args'           => array(
							'pid', // param1
							array( // queryHeaders
								'query'    => array('raw' => true),
								'language' => 'en',
								'meta'     => array('data' => 'data'),
							)
						)
					),
					'result'  => array(
						'httpMethod'     => $method,
						'requestUrl'     => '/v1/products/pid',
						'payload'        => null,
						'query'          => array('raw' => 'true'), // stringified boolean
						'headers'        => array('Accept-Language' => 'en'),
						'meta'           => array('data' => 'data'),
					)
				),
			);

		}

		function buildPostPutTestCases($method) {

			return array(
				array(
					'options' => array(
						'httpMethod'     => $method,
						'path'           => '/v1/store', // no params
						'params'         => array(),
						'withoutPayload' => false,
						'args'           => array(
							array('slug' => 'new-slug') // payload
						)
					),
					'result'  => array(
						'httpMethod'     => $method,
						'requestUrl'     => '/v1/store',
						'payload'        => array('slug' => 'new-slug'),
						'query'          => array(),
						'headers'        => array(),
						'meta'           => array(),
					)
				),
				array(
					'options' => array(
						'httpMethod'     => $method,
						'path'           => '/v1/products/{productId}',
						'params'         => array('productId'),
						'withoutPayload' => false,
						'args'           => array(
							'pid', // param1
							array( // payload
								'slug' => 'new-slug'
							),
							array( // queryHeaders
								'query'    => array('raw' => true),
								'language' => 'en',
							)
						)
					),
					'result'  => array(
						'httpMethod'     => $method,
						'requestUrl'     => '/v1/products/pid',
						'payload'        => array('slug' => 'new-slug'),
						'query'          => array('raw' => 'true'), // stringified boolean
						'headers'        => array('Accept-Language' => 'en'),
						'meta'           => array(),
					)
				),
				array(
					'options' => array(
						'httpMethod'     => $method,
						'path'           => '/v1/me/products/reviews/{reviewId}/flag',
						'params'         => array('reviewId'),
						'withoutPayload' => true, // no payload
						'args'           => array(
							'rid', // param1
							array( // queryHeaders
								'query'    => array('raw' => true),
								'language' => 'en',
								'meta'     => array('data' => 'data'),
							)
						)
					),
					'result'  => array(
						'httpMethod'     => $method,
						'requestUrl'     => '/v1/me/products/reviews/rid/flag',
						'payload'        => null,
						'query'          => array('raw' => 'true'), // stringified boolean
						'headers'        => array('Accept-Language' => 'en'),
						'meta'           => array('data' => 'data'),
					)
				),
			);

		}

		$cases = array_merge(
			buildGetDeleteTestCases('GET'),
			buildGetDeleteTestCases('DELETE'),
			buildPostPutTestCases('POST'),
			buildPostPutTestCases('PUT')
		);

		foreach ($cases as $c) {
			$this->assertEquals(Clayful::extractRequestArguments($c['options']), $c['result']);
		}

	}

	public function testCallAPIWithoutError() {

		$requestTriggered = false;
		$responseTriggered = false;

		// Make a mock request plugin
		$mockRequester = new MockRequester(array('response' => true));

		// Install the plugin
		Clayful::install('request', array($mockRequester, 'request'));

		Clayful::on('request', function(&$detail) use (&$requestTriggered) {
			$this->assertEquals($detail, array(
				'modelName'      => 'Product',
				'methodName'     => 'update',
				'httpMethod'     => 'PUT',
				'requestUrl'     => 'https://api.clayful.io/v1/products/pid',
				'payload'        => array('slug' => 'new-slug'),
				'query'          => array('raw' => 'true'), // stringified boolean
				'headers'        => array(
					'Accept-Encoding' => 'gzip',
					'Accept-Language' => 'en',
					'X-Clayful-SDK'   => 'clayful-php'
				),
				'usesFormData' => false,
				'meta'         => array('data' => 'data'),
				'error'        => null,
				'response'     => null, // no response yet
			));
			$requestTriggered = true;
		});

		Clayful::on('request', function(&$detail) {
			$detail['meta']['requestCalled'] = true; // directly modify $detail
		});

		Clayful::on('response', function(&$detail) use (&$responseTriggered) {
			$this->assertEquals($detail, array(
				'modelName'      => 'Product',
				'methodName'     => 'update',
				'httpMethod'     => 'PUT',
				'requestUrl'     => 'https://api.clayful.io/v1/products/pid',
				'payload'        => array('slug' => 'new-slug'),
				'query'          => array('raw' => 'true'), // stringified boolean
				'headers'        => array(
					'Accept-Encoding' => 'gzip',
					'Accept-Language' => 'en',
					'X-Clayful-SDK'   => 'clayful-php'
				),
				'usesFormData' => false,
				'meta'         => array(
					'data'          => 'data',
					'requestCalled' => true, // added from 'request' event listener
				),
				'error'        => null,
				'response'     => array('response' => true), // response populated
			));
			$responseTriggered = true;
		});

		$response = Clayful::callAPI(array(
			'modelName'      => 'Product',
			'methodName'     => 'update',
			'httpMethod'     => 'PUT',
			'path'           => '/v1/products/{productId}',
			'params'         => array('productId'),
			'usesFormData'   => false,
			'withoutPayload' => false,
			'args'           => array(
				'pid', // param1
				array( // payload
					'slug' => 'new-slug'
				),
				array( // queryHeaders
					'query'    => array('raw' => true),
					'language' => 'en',
					'meta'     => array('data' => 'data')
				)
			)
		));

		$this->assertEquals($response, array('response' => true));
		$this->assertEquals($requestTriggered, true);
		$this->assertEquals($responseTriggered, true);

	}

	public function testCallAPIWithClayfulException() {

		$requestTriggered = false;
		$responseTriggered = false;

		$error = new ClayfulException();

		// Throws ClayfulException
		$mockRequester = new MockRequester($error);

		// Install the plugin
		Clayful::install('request', array($mockRequester, 'request'));

		Clayful::on('request', function(&$detail) use (&$requestTriggered) {
			$this->assertEquals($detail, array(
				'modelName'      => 'Product',
				'methodName'     => 'update',
				'httpMethod'     => 'PUT',
				'requestUrl'     => 'https://api.clayful.io/v1/products/pid',
				'payload'        => array('slug' => 'new-slug'),
				'query'          => array('raw' => 'true'), // stringified boolean
				'headers'        => array(
					'Accept-Encoding' => 'gzip',
					'Accept-Language' => 'en',
					'X-Clayful-SDK'   => 'clayful-php'
				),
				'usesFormData' => false,
				'meta'         => array(), // default meta
				'error'        => null, // no error yet
				'response'     => null,
			));
			$requestTriggered = true;
		});

		Clayful::on('response', function(&$detail) use (&$responseTriggered, &$error) {
			$this->assertEquals($detail, array(
				'modelName'      => 'Product',
				'methodName'     => 'update',
				'httpMethod'     => 'PUT',
				'requestUrl'     => 'https://api.clayful.io/v1/products/pid',
				'payload'        => array('slug' => 'new-slug'),
				'query'          => array('raw' => 'true'), // stringified boolean
				'headers'        => array(
					'Accept-Encoding' => 'gzip',
					'Accept-Language' => 'en',
					'X-Clayful-SDK'   => 'clayful-php'
				),
				'usesFormData' => false,
				'meta'         => array(),
				'error'        => $error,
				'response'     => null,
			));
			$responseTriggered = true;
		});

		try {

			$response = Clayful::callAPI(array(
				'modelName'      => 'Product',
				'methodName'     => 'update',
				'httpMethod'     => 'PUT',
				'path'           => '/v1/products/{productId}',
				'params'         => array('productId'),
				'usesFormData'   => false,
				'withoutPayload' => false,
				'args'           => array(
					'pid', // param1
					array( // payload
						'slug' => 'new-slug'
					),
					array( // queryHeaders
						'query'    => array('raw' => true),
						'language' => 'en',
					)
				)
			));

			// Just to check `ClayfulException` is thrown
			$this->assertEquals(1, 2);

		} catch (ClayfulException $e) {

			$this->assertEquals($e, $error);
			$this->assertEquals($requestTriggered, true);
			$this->assertEquals($responseTriggered, true);

		}

	}

	public function testCallAPIWithOtherException() {

		$requestTriggered = false;
		$responseTriggered = false;

		// Throws regular Exception
		$mockRequester = new MockRequester(new \Exception());

		// Install the plugin
		Clayful::install('request', array($mockRequester, 'request'));

		Clayful::on('request', function(&$detail) use (&$requestTriggered) {
			$requestTriggered = true;
		});

		Clayful::on('response', function(&$detail) use (&$responseTriggered) {
			$responseTriggered = true;
		});

		try {

			$response = Clayful::callAPI(array(
				'modelName'      => 'Product',
				'methodName'     => 'update',
				'httpMethod'     => 'PUT',
				'path'           => '/v1/products/{productId}',
				'params'         => array('productId'),
				'usesFormData'   => false,
				'withoutPayload' => false,
				'args'           => array(
					'pid',
					array(
						'slug' => 'new-slug'
					),
				)
			));

			// Just to check `Exception` is thrown
			$this->assertEquals(1, 2);

		} catch (\Exception $e) {

			$this->assertEquals($requestTriggered, true);
			$this->assertEquals($responseTriggered, false); // shouldn't be called

		}

	}

	public function testConfigClient() {

		Clayful::config(array(
			'language'      => 'ko',
			'currency'      => 'KRW',
			'timeZone'      => 'Asia/Seoul',
			'client'        => 'client_token',
			'customer'      => 'customer_token',
			'errorLanguage' => 'en',
			'headers'       => array(
				'X-Extra' => 'Extra'
			)
 		));

		$this->assertEquals(Clayful::$defaultHeaders, array(
			'Accept-Encoding'          => 'gzip',
			'Accept-Language'          => 'ko',
			'Accept-Currency'          => 'KRW',
			'Accept-Time-Zone'         => 'Asia/Seoul',
			'Authorization'            => 'Bearer client_token',
			'X-Clayful-SDK'            => 'clayful-php',
			'X-Clayful-Customer'       => 'customer_token',
			'X-Clayful-Error-Language' => 'en',
			'X-Extra'                  => 'Extra'
		));

	}

	public function testInstallRequestPlugin() {

		Clayful::install('request', 'myCustomPlugin');

		$this->assertEquals(Clayful::$plugins['request'], 'myCustomPlugin');

	}

	public function testEventListeners() {

		$requestTriggered = false;
		$responseTriggered = false;

		$this->assertEquals(count(Clayful::$listeners['request']), 0);
		$this->assertEquals(count(Clayful::$listeners['response']), 0);

		$callback = function() {};

		// Should add event listeners
		Clayful::on('request', $callback);
		Clayful::on('response', $callback);

		$this->assertEquals(count(Clayful::$listeners['request']), 1);
		$this->assertEquals(count(Clayful::$listeners['response']), 1);
		$this->assertEquals(Clayful::$listeners['request'][0], $callback);
		$this->assertEquals(Clayful::$listeners['response'][0], $callback);

		// Should remove event listeners
		Clayful::off('request', $callback);
		Clayful::off('response', $callback);

		$this->assertEquals(count(Clayful::$listeners['request']), 0);
		$this->assertEquals(count(Clayful::$listeners['response']), 0);

		Clayful::on('request', function($data) use (&$requestTriggered) {
			$requestTriggered = true;
			$this->assertEquals($data, 1);
		});
		Clayful::on('response', function($data) use (&$responseTriggered) {
			$responseTriggered = true;
			$this->assertEquals($data, 2);
		});

		// Should trigger event listeners
		$d1 = 1;
		$d2 = 2;

		Clayful::trigger('request', $d1);
		Clayful::trigger('response', $d2);

		$this->assertEquals($requestTriggered, true);
		$this->assertEquals($responseTriggered, true);

	}

	public function testFormatImageUrl() {

		$url = 'http://clayful.io';

		$cases = array(
			array(
				'out'     => $url
			),
			array(
				'out'     => $url,
				'options' => array()
			),
			array(
				'out'     => $url . '?width=120',
				'options' => array('width' => 120)
			),
			array(
				'out'     => $url . '?width=120&height=120',
				'options' => array('width' => 120, 'height' => 120)
			)
		);

		foreach ($cases as $c) {

			if (array_key_exists('options', $c)) {
				$this->assertEquals(Clayful::formatImageUrl($url, $c['options']), $c['out']);
			} else {
				$this->assertEquals(Clayful::formatImageUrl($url), $c['out']);
			}

		}

	}

	public function testFormatNumber() {

		$cases = array(
			array(
				'in'      => null,
				'out'     => ''
			),
			array(
				'in'      => 10,
				'out'     => '10'
			),
			array(
				'options' => array(),
				'in'      => 10,
				'out'     => '10'
			),
			// precision tests
			array(
				'in'      => 0.250,
				'out'     => '0.25'
			),
			array(
				'options' => array('precision' => 0),
				'in'      => 0,
				'out'     => '0'
			),
			array(
				'options' => array('precision' => 0),
				'in'      => 1234567.25,
				'out'     => '1234567'
			),
			array(
				'options' => array('precision' => 1),
				'in'      => 1234567.24,
				'out'     => '1234567.2' // rounded
			),
			array(
				'options' => array('precision' => 1),
				'in'      => 1234567.25,
				'out'     => '1234567.3' // rounded
			),
			array(
				'options' => array('precision' => 2),
				'in'      => 1234567.25,
				'out'     => '1234567.25'
			),
			array(
				'options' => array('precision' => 3),
				'in'      => 1234567.25,
				'out'     => '1234567.250'
			),
			array(
				'options' => array('precision' => 0),
				'in'      => 1234567,
				'out'     => '1234567'
			),
			array(
				'options' => array('precision' => 3),
				'in'      => 1234567,
				'out'     => '1234567.000'
			),
			// delimiter tests
			array(
				'options' => array(
					'precision' => 3
				),
				'in'  => 1234567.25,
				'out' => '1234567.250'
			),
			array(
				'options' => array(
					'precision' => 3,
					'delimiter' => array()
				),
				'in'  => 1234567.25,
				'out' => '1234567.250'
			),
			array(
				'options' => array(
					'precision' => 3,
					'delimiter' => array(
						'thousands' => ','
					)
				),
				'in'  => 1234567.25,
				'out' => '1,234,567.250'
			),
			array(
				'options' => array(
					'precision' => 3,
					'delimiter' => array(
						'thousands' => ' ',
						'decimal'   => ','
					)
				),
				'in'  => 1234567.25,
				'out' => '1 234 567,250'
			),
		);

		foreach ($cases as $c) {

			if (array_key_exists('options', $c)) {
				$this->assertEquals(Clayful::formatNumber($c['in'], $c['options']), $c['out']);
			} else {
				$this->assertEquals(Clayful::formatNumber($c['in']), $c['out']);
			}

		}

	}

	public function testFormatPrice() {

		$cases = array(
			array(
				'in'      => null,
				'out'     => ''
			),
			array(
				'in'      => 0,
				'out'     => '0'
			),
			array(
				'options' => array(),
				'in'      => 0,
				'out'     => '0'
			),
			array(
				'in'      => 1234567.25,
				'out'     => '1234567.25'
			),
			array(
				'options' => array(),
				'in'      => 1234567.25,
				'out'     => '1234567.25'
			),
			array(
				'options' => array(
					'symbol'    => '$',
					'format'    => '{symbol}{price}',
					'precision' => 2,
					'delimiter' => array(
						'thousands' => ',',
						'decimal'   => '.'
					)
				),
				'in'      => 1234567.25,
				'out'     => '$1,234,567.25'
			),
			array(
				'options' => array(
					'symbol'    => '원',
					'format'    => '{price}{symbol}',
					'precision' => 0,
					'delimiter' => array(
						'thousands' => ',',
						'decimal'   => '.'
					)
				),
				'in'      => 1234567.25,
				'out'     => '1,234,567원'
			),
		);

		foreach ($cases as $c) {

			if (array_key_exists('options', $c)) {
				$this->assertEquals(Clayful::formatPrice($c['in'], $c['options']), $c['out']);
			} else {
				$this->assertEquals(Clayful::formatPrice($c['in']), $c['out']);
			}

		}

	}

}