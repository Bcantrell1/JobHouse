<?php

/*
 * Project Name: Milestone 7
 * Version: 7.0
 * Programmers: Brian Cantrell
 * Date: 4/30/2021
 */

namespace App\Http\Controllers;

use Exception;
use App\Models\LoginRequest;
use App\Services\Business\SecurityService;
use App\Services\Utility\ILoggerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    protected $logger;
    
    public function __construct(ILoggerService $iLogger) {
        $this->logger = $iLogger;
    }

    function index(Request $request)
    {        
        return view("login");
    }

    function attemptLogin(Request $request)
    {
        try {

            //variables
            $email = $request->input('email');
            $password = $request->input('password');

            $this->logger->info("Parameters are: ", array(
                "email" => $email,
                "password" => $password
            ));

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
                $this->logger->info("Exiting LoginController::attemptLogin() with login failing");
                //return if failed
                return view('login', array(
                    'msg' => $response->getMsg()
                ));
            }
        } catch (Exception $e) {
            $this->logger->info("Exception LoginController::attemptLogin()" . $e->getMessage(), null);
        }
    }
}