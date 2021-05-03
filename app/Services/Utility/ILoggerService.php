<?php

/*
 * Project Name: Milestone 7
 * Version: 7.0
 * Programmers: Brian Cantrell
 * Date: 4/30/2021
 */

namespace App\Services\Utility;

interface ILoggerService
{
		public function debug($param);
		public function info($param);
		public function warning($param);
		public function error($param);
}