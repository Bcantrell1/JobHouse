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

class APIUserController extends Controller
{
    
 public function index(Request $request, $email) {
        $dto = new DTO();
        $userDAO = new DAO('users');

        $dto->data = $userDAO->list([[
            'EMAIL',
            'LIKE',
            '%' . $email . '%'
        ]]);
        return $dto;
    }
}