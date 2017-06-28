<?php
namespace Clayful;

class ClayfulException extends \Exception {

	public $isClayful = true;
	public $model = null;
	public $method = null;
	public $status = null;
	public $headers = null;
	public $code = null; // override code to accept string
	public $message = '';
	public $validation = null;

	public function __construct($model = null, $method = null, $status = null, $headers = null, $code = null, $message = '', $validation = null, Exception $previous = null) {

		$this->model = $model;
		$this->method = $method;
		$this->status = $status;
		$this->headers = $headers;
		$this->code = $code;
		$this->validation = $validation;

		parent::__construct($message, 0, $previous);

	}

	public function __toString() {

		return __CLASS__ . ": [{$this->code}]: {$this->message}\n";

	}

}