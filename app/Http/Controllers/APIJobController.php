<?php

/*
 * Project Name: Milestone 7
 * Version: 7.0
 * Programmers: Brian Cantrell
 * Date: 4/30/2021
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Data\DAO;
use App\Models\DTO;

class APIJobController extends Controller
{
 public function index(Request $request) {
        $jobsDAO = new DAO('job_postings');

        $dto = new DTO();
        $dto->data = $jobsDAO->list();
        return $dto;
    }
 public function findSpecific(Request $request, $keyword) {
        $jobsDAO = new DAO('job_postings');

        $dto = new DTO();
        $dto->data = $jobsDAO->list([[
            'NAME',
            'LIKE',
            '%' . $keyword . '%'
        ]]);
        return $dto;
    }
}