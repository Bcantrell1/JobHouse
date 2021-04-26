<?php

/*
 * Project Name: Milestone 6
 * Version: 6.0
 * Programmers: Brian Cantrell
 * Date: 4/24/2021
 */

namespace App\Http\Controllers;

use Exception;
use App\Models\LoginRequest;
use App\Services\Business\SecurityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    
    public function __construct() {
        
    }


    function index(Request $request)
    {
        Log::info("Entering LoginController::index()");

        return view("login");
    }

    function attemptLogin(Request $request)
    {
        try {

            //variables
            $email = $request->input('email');
            $password = $request->input('password');

            Log::info("Parameters are: ", array(
                'email' => $email,
                'password' => $password
            ));

            //initialize login request
            $loginRequest = new LoginRequest($email, $password);
            //initialize security business service
            $securityService = new SecurityService();
            //login response
            $response = $securityService->login($loginRequest);
            //check if login passed
            if ($response->getSuccess()) {
                Log::info("Exiting LoginController::index() login passed.");

                session_start();
                $userWithCVItems = $securityService->getUser($email);
                $request->session()->put('userId', $userWithCVItems->id);
                //return if passed
                return view('home', ['user' => $userWithCVItems]);
            } else {
                Log::info("Exiting LoginController::index() login failed.");
                //return if failed
                return view('login', array(
                    'msg' => $response->getMsg()
                ));
            }
        } catch (Exception $e) {
            Log::error("Exception caught in LoginController::index()" . $e->getMessage());
        }
    }
}