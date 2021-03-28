<?php

/*
 * Project Name: Milestone 1
 * Version: 1.0
 * Programmers: Brian Cantrell
 * Date: 3/25/2021
 */

namespace App\Models;

class ServiceResponse
{

    // variables
    private $success;
    private $msg;

    // constructor
    function __construct()
    {
        $success = false;
    }

    /**
     *
     * @return mixed
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     *
     * @return mixed
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     *
     * @param mixed $success
     */
    public function setSuccess($success)
    {
        $this->success = $success;
    }

    /**
     *
     * @param mixed $data
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;
    }
}