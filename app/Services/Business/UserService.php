<?php 

/*
 * Project Name: Milestone 7
 * Version: 7.0
 * Programmers: Brian Cantrell
 * Date: 4/30/2021
 */

namespace App\Services\Business;

use App\Models\UserModel;
use App\Services\Data\UserDAO;


class UserService
{

    // returns user from db based on id
    public function getUser($id)
    {
        $userDAO = new UserDAO();
        $response = $userDAO->findUser($id);
        return new UserModel($response->id, $response->EMAIL, $response->PASSWORD, $response->FIRSTNAME, $response->LASTNAME, $response->RIGHTS, $response->ROLE);
    }

    // updates user
    public function updateUser($user)
    {
        $userDAO = new UserDAO();
        if ($userDAO->updateUser($user) > 0)
            return true;

        return false;
    }

    public function loggedIn()
    {
        if (session('user'))
            return true;
        return false;
    }

    public function isAdmin()
    {
        if ($this->loggedIn())
            if (session('user')->getRights() > 0)
                return true;
        return false;   
    }
}