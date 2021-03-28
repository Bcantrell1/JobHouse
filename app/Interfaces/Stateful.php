<?php

namespace App\Interfaces;

interface Stateful
{
		public function get($id);
		public function list($filter);
		public function create($input);
		public function update($id, $input);
		public function delete($id);
}