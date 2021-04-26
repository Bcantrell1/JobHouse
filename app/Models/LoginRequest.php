<?php

/*
 * Project Name: Milestone 6
 * Version: 6.0
 * Programmers: Brian Cantrell
 * Date: 4/24/2021
 */

namespace App\Models;

class LoginRequest
{

    // variables
    private $email;
    private $password;

    // constructor
    function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    // getters and setters
    
    /**
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     *
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     *
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
}