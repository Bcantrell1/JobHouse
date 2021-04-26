<?php

/*
 * Project Name: Milestone 6
 * Version: 6.0
 * Programmers: Brian Cantrell
 * Date: 4/24/2021
 */

namespace App\Services\Data;

use Illuminate\Support\Facades\DB;
use App\Models\UserModel;

class UserDAO {
    
    //Query users in the users table
    public function retrieveUsers() {
      return DB::table('users')->get();
    }
  
    //Make sure no user with the same ID exisits 
    public function userExists($id) {
      $response = DB::table('users')->where('id', $id)
        ->count();
    
      if ($response > 0) {
          return true;
      } else {
          return false;
      }
    }
    
    //Find user by user Id 
    public function findById($id) {
    	$response = DB::table('users')->where('id', $id)->first();
    	if(isset($response)) {
    		return $response;
    	} else {
    		return NULL;
    	}
    }
	
    //Update user information
	public function update(UserModel $user) {
		$changes = DB::table('users')->where('id', $user->getId())
						->update(['EMAIL' => $user->getEmail(),
						'FIRSTNAME' => $user->getFirstName(),
						'LASTNAME' => $user->getLastName(),
						'ROLE' => $user->getRole(),
						'SUSPENDED' => $user->getSuspended()]);
						return $changes > 0;
    }
    
    //Update user information
	public function delete($id) {
		return DB::table('users')->where('id', $id)->delete();
	}
}