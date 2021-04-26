<?php

/*
 * Project Name: Milestone 6
 * Version: 6.0
 * Programmers: Brian Cantrell
 * Date: 4/24/2021
 */

namespace App\Services\Utility;

interface ILoggerService
{
		public function debug($param);
		public function info($param);
		public function warning($param);
		public function error($param);
}