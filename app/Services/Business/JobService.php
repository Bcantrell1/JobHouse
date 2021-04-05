<?php

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