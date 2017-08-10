<?php
namespace Clayful\Tests;

use Clayful\Clayful;

class MockRequester {

	public $options = null;

	public function request($options) {

		$this->options = $options;

	}

	public function reset() {

		$this->options = null;

	}

}

class ClayfulTest extends \PHPUnit_Framework_TestCase {

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
			'Accept-Language'                  => 'ko',
			'Accept-Currency'                  => 'KRW',
			'Accept-Time-Zone'                 => 'Asia/Seoul',
			'Authorization'                    => 'Bearer client_token',
			'X-Clayful-Customer-Authorization' => 'Bearer customer_token',
			'X-Clayful-Error-Language'         => 'en',
			'X-Extra'                          => 'Extra'
		));

	}

	public function testGetAPIEndpoint() {

		$this->assertEquals(Clayful::getEndPoint('/v1/products'), Clayful::$baseUrl . '/v1/products');

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
								'language' => 'en'
							)
						)
					),
					'result'  => array(
						'httpMethod'     => $method,
						'requestUrl'     => '/v1/products/pid',
						'payload'        => null,
						'query'          => array('raw' => 'true'), // stringified boolean
						'headers'        => array('Accept-Language' => 'en'),
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
								'language' => 'en'
							)
						)
					),
					'result'  => array(
						'httpMethod'     => $method,
						'requestUrl'     => '/v1/products/pid',
						'payload'        => array('slug' => 'new-slug'),
						'query'          => array('raw' => 'true'), // stringified boolean
						'headers'        => array('Accept-Language' => 'en'),
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
								'language' => 'en'
							)
						)
					),
					'result'  => array(
						'httpMethod'     => $method,
						'requestUrl'     => '/v1/me/products/reviews/rid/flag',
						'payload'        => null,
						'query'          => array('raw' => 'true'), // stringified boolean
						'headers'        => array('Accept-Language' => 'en'),
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

	public function testCallAPI() {

		// Check original default headers
		$this->assertEquals(Clayful::$defaultHeaders, array(
			'Accept-Encoding' => 'gzip',
			'X-Clayful-SDK'   => 'clayful-php'
		));

		// Make a mock request plugin
		$mockRequester = new MockRequester();

		// Install the plugin
		Clayful::install('request', array($mockRequester, 'request'));

		Clayful::callAPI(array(
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
					'language' => 'en'
				)
			)
		));

		$this->assertEquals($mockRequester->options, array(
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
			'usesFormData'   => false,
		));

		// Check if the default headers are mutated
		$this->assertEquals(Clayful::$defaultHeaders, array(
			'Accept-Encoding' => 'gzip',
			'X-Clayful-SDK'   => 'clayful-php'
		));

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
			'Accept-Encoding'                  => 'gzip',
			'Accept-Language'                  => 'ko',
			'Accept-Currency'                  => 'KRW',
			'Accept-Time-Zone'                 => 'Asia/Seoul',
			'Authorization'                    => 'Bearer client_token',
			'X-Clayful-SDK'                    => 'clayful-php',
			'X-Clayful-Customer-Authorization' => 'Bearer customer_token',
			'X-Clayful-Error-Language'         => 'en',
			'X-Extra'                          => 'Extra'
		));

	}

	public function testInstallRequestPlugin() {

		Clayful::install('request', 'myCustomPlugin');

		$this->assertEquals(Clayful::$plugins['request'], 'myCustomPlugin');

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