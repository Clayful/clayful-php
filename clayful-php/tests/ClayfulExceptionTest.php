<?php
namespace Clayful\Tests;

use Clayful\ClayfulException;

class ClayfulExceptionTest extends \PHPUnit_Framework_TestCase {

	public function testConstructClayfulException() {

		$exception = new ClayfulException(
			'Product',
			'update',
			404,
			array('X-Fake-Header' => 'Fake'),
			'g-get-product',
			'Not existing product.',
			array('key' => 'value')
		);

		$this->assertEquals($exception->model, 'Product');
		$this->assertEquals($exception->method, 'update');
		$this->assertEquals($exception->status, 404);
		$this->assertEquals($exception->headers, array('X-Fake-Header' => 'Fake'));
		$this->assertEquals($exception->code, 'g-get-product');
		$this->assertEquals($exception->message, 'Not existing product.');
		$this->assertEquals($exception->validation, array('key' => 'value'));

	}

	public function testThrowClayfulException() {

		$this->expectException(ClayfulException::class);

		throw new ClayfulException(
			'Product',
			'update',
			404,
			array('X-Fake-Header' => 'Fake'),
			'g-get-product',
			'Not existing product.',
			array('key' => 'value')
		);

	}

}