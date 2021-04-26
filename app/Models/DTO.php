<?php

/*
 * Project Name: Milestone 6
 * Version: 6.0
 * Programmers: Brian Cantrell
 * Date: 4/24/2021
 */

namespace App\Models;

use JsonSerializable;

class DTO implements JsonSerializable {
	public $data;
	public $errorCode;
	public $errorMessage;

	public function __construct() {
		$this->data = [];
		$this->errorCode = null;
		$this->errorMessage = null;
	}

	public function jsonSerialize() {
        return get_object_vars($this);
    }
}