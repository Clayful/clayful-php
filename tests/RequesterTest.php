<?php
namespace Clayful\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Response;

use Clayful\Requester;
use Clayful\ClayfulException;

class ClayfulRequesterTest extends \PHPUnit_Framework_TestCase {

	public function testDefaultClient() {

		$this->assertInstanceOf(Client::class, Requester::$client);

	}

	public function testSetClient() {

		$mock = new MockHandler(array(
			// Regular response
			new Response(200, array('Content-Language' => 'ko'), Psr7\stream_for('[{"_id": "abcdefg"}]')),
			// No body
			new Response(204, array('Content-Language' => 'ko')),
			// Error with all details
			new Response(400, array('Content-Language' => 'ko'), Psr7\stream_for('{"errorCode":"g-validation","message":"validation error","validation":{}}')),
		));

		$handler = HandlerStack::create($mock);

		$client = new Client(array('handler' => $handler));

		Requester::client($client);

		$this->assertEquals(Requester::$client, $client);

	}

	public function testCheckResponseWithBody() {

		$result = Requester::request(array(
			'modelName'    => 'Product',
			'methodName'   => 'query',
			'httpMethod'   => 'GET',
			'requestUrl'   => 'https://api.clayful.io/v1/products',
			'query'        => array('fields' => '_id'),
			'headers'      => array('Accept-Language' => 'ko'),
			'payload'      => null,
			'usesFormData' => false
		));

		$this->assertEquals($result->status, 200);
		$this->assertEquals($result->headers, array('Content-Language' => 'ko'));
		$this->assertEquals($result->data, array(array('_id' => 'abcdefg')));

	}

	public function testCheckResponseWithoutBody() {

		$result = Requester::request(array(
			'modelName'    => 'Product',
			'methodName'   => 'delete',
			'httpMethod'   => 'DELETE',
			'requestUrl'   => 'https://api.clayful.io/v1/products/abcdefg',
			'query'        => array(),
			'headers'      => array(),
			'payload'      => null,
			'usesFormData' => false
		));

		$this->assertEquals($result->status, 204);
		$this->assertEquals($result->headers, array('Content-Language' => 'ko'));
		$this->assertEquals($result->data, null);

	}

	public function testCheckErrorResponse() {

		try {

			Requester::request(array(
				'modelName'    => 'Product',
				'methodName'   => 'query',
				'httpMethod'   => 'GET',
				'requestUrl'   => 'https://api.clayful.io/v1/products',
				'query'        => array(),
				'headers'      => array(),
				'payload'      => null,
				'usesFormData' => false
			));

		} catch (ClayfulException $e) {

			$this->assertEquals($e->isClayful, true);
			$this->assertEquals($e->model, 'Product');
			$this->assertEquals($e->method, 'query');
			$this->assertEquals($e->status, 400);
			$this->assertEquals($e->headers, array('Content-Language' => 'ko'));
			$this->assertEquals($e->code, 'g-validation');
			$this->assertEquals($e->message, 'validation error');
			$this->assertEquals($e->validation, array());

		}

	}

	public function testSetGuzzleRequestOptions() {

		$mock = new MockHandler(array(
			new Response(200, array()),
			new Response(200, array()),
		));

		$container = [];
		$history = Middleware::history($container);

		$stack = HandlerStack::create($mock);

		$stack->push($history);

		$client = new Client(array('handler' => $stack));

		Requester::client($client);

		Requester::request(array(
			'modelName'    => 'Product',
			'methodName'   => 'create',
			'httpMethod'   => 'POST',
			'requestUrl'   => 'https://api.clayful.io/v1/products',
			'query'        => array('raw' => 'true'),
			'headers'      => array('Accept-Language' => 'en'),
			'payload'      => array(),
			'usesFormData' => false
		));

		Requester::request(array(
			'modelName'    => 'Image',
			'methodName'   => 'create',
			'httpMethod'   => 'POST',
			'requestUrl'   => 'https://api.clayful.io/v1/image',
			'query'        => array('raw' => 'true'),
			'headers'      => array('Accept-Language' => 'en'),
			'payload'      => array(array('name' => 'file', 'contents' => 'file')),
			'usesFormData' => true // multipart/form-data
		));

		$this->assertEquals($container[0]['request']->getMethod(), 'POST');
		$this->assertEquals($container[0]['request']->getUri()->getHost(), 'api.clayful.io');
		$this->assertEquals($container[0]['request']->getUri()->getQuery(), 'raw=true');
		$this->assertEquals($container[0]['request']->getHeader('Accept-Language'), array('en'));
		$this->assertEquals($container[0]['request']->getHeader('Content-Type'), array('application/json'));

		$this->assertEquals($container[1]['request']->getMethod(), 'POST');
		$this->assertEquals($container[1]['request']->getUri()->getHost(), 'api.clayful.io');
		$this->assertEquals($container[1]['request']->getUri()->getQuery(), 'raw=true');
		$this->assertEquals($container[1]['request']->getHeader('Accept-Language'), array('en'));
		$this->assertStringStartsWith('multipart/form-data', $container[1]['request']->getHeader('Content-Type')[0]);

	}

}