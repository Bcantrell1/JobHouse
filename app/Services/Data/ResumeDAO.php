<?php

namespace App\Services\Data;

use Illuminate\Support\Facades\DB;

class ResumeDAO
{
  public function list($filter = [])
    {
      return DB::table('resume_items')->where($filter)->get();
    }
	public function get($id) {
		$response = DB::table('resume_items')->where('id', $id)->first();
		if(isset($response)) {
			return $response;
		} else {
			return NULL;
		}
	}
	public function create($input) {
		$id = DB::table('resume_items')->insertGetId($input);
		return $this->get($id);
	}
	public function update($id, $input) {
		$affected = DB::table('resume_items')
            ->where('id', $id)
            ->update($input);
		return $this->get($id);
  }
	public function delete($id) {
		return DB::table('resume_items')->where('id', $id)->delete();
	}
}