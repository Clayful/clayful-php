<?php
namespace Clayful;

class ClayfulResponse {

	public $status = null;
	public $data = null;
	public $headers = null;

	public function __construct($status, $data, $headers) {

		$this->status = $status;
		$this->data = $data;
		$this->headers = $headers;

	}

}