<?php

/*
 * Project Name: Milestone 1
 * Version: 1.0
 * Programmers: Brian Cantrell
 * Date: 3/25/2021
 */

namespace App\Services\Data;

use Illuminate\Support\Facades\DB;
use App\Interfaces\Stateful;

class DAO implements Stateful {
	private $tableName;
	function __construct($tableName = '') {
		$this->tableName = $tableName;
	}

    public function list($filter = [])
    {
      return DB::table($this->tableName)->where($filter)->get();
    }
    public function get($id) {
    	$response = DB::table($this->tableName)->where('id', $id)->first();
    	if(isset($response)) {
    		return $response;
    	} else {
    		return NULL;
    	}
    }
	public function create($input) {
		$id = DB::table($this->tableName)->insertGetId($input);
		return $this->get($id);
	}
	public function update($id, $input) {
	    $changes = DB::table($this->tableName)
              ->where('id', $id)
							->update($input);
		return $this->get($id);
    }
	public function delete($id) {
		return DB::table($this->tableName)->where('id', $id)->delete();
	}
}
