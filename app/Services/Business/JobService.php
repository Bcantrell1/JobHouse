<?php

/*
 * Project Name: Milestone 7
 * Version: 7.0
 * Programmers: Brian Cantrell
 * Date: 4/30/2021
 */

namespace App\Services\Business;
use App\Services\Data\DAO;

class JobService
{
    private $jobsDAO;
		private $usersDAO;
    function __construct() {
        $this->jobsDAO = new DAO('job_postings');
        $this->usersDAO = new DAO('users');
    }
}