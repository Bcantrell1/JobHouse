<?php

/*
 * Project Name: Milestone 1
 * Version: 1.0
 * Programmers: Brian Cantrell
 * Date: 3/25/2021
 */

namespace App\Http\Controllers;

use App\Models\LoginRequest;
use App\Services\Business\SecurityService;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    function index(Request $request)
    {
        return view("login");
    }

    function attemptLogin(Request $request)
    {
        //variables
        $email = $request->input('email');
        $password = $request->input('password');

        //initialize login request
        $loginRequest = new LoginRequest($email, $password);
        //initialize security business service
        $securityService = new SecurityService();
        //login response
        $response = $securityService->login($loginRequest);
        //check if login passed
        if ($response->getSuccess()) {
            session_start();
            $userWithCVItems = $securityService->getUser($email);
            $request->session()->put('userId', $userWithCVItems->id);
            //return if passed
            return view('home', ['user' => $userWithCVItems]);
        } else {
            //return if failed
            return view('login', array(
                'msg' => $response->getMsg()
            ));
        }
    }
}
