<?php

/*
 * Project Name: Milestone 6
 * Version: 6.0
 * Programmers: Brian Cantrell
 * Date: 4/24/2021
 */

namespace App\Services\Utility;

use App\Services\Utility\ILogger;
use Illuminate\Support\Facades\Log;


class MyLogger1 implements ILogger {
	public static function getLogger() {
	return null;
	}
	public function info($param) {
		return Log::info($param);
	}
	public function debug($param) {
		return Log::debug($param);
	}
	public function warning($param) {
		return Log::warning($param);
	}
	public function error($param) {
		return Log::error($param);
	}
}