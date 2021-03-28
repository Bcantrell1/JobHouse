<?php 

/*
 * Project Name: Milestone 1
 * Version: 1.0
 * Programmers: Brian Cantrell
 * Date: 3/25/2021
 */

namespace App\Http\Controllers;

use App\Models\RegisterRequest;
use App\Services\Business\SecurityService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    function index(Request $request)
    {
        return View("register");
    }

    //called on when user submits register form
    function attemptRegister(Request $request)
    {
        $this->validateForm($request);

        //variables
        $email = $request->input('email');
        $password = $request->input('password');
        $passwordConfirm = $request->input('passwordConfirm');
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');

        //initialize register request model
        $registerRequest = new RegisterRequest($email, $password, $passwordConfirm, $firstName, $lastName);
        //initialize security business service
        $securityService = new SecurityService();

        //register response
        $response = $securityService->register($registerRequest);

        //check if registration passed
        if ($response->getSuccess()) {
            //return if passed
            return view('login');
        } else {
            return view('Home');
        }
    }

    private function validateForm(Request $request)
    {
        // Setup Data Validation Rules for Login Form

        $rules = [
            'firstName' => 'Required | Max:30',
            'lastName' => 'Required | Max:30',
            'email' => 'Required | Email',
            'password' => 'Required | Between:8,16',
            'passwordConfirm' => 'Required | same:password'

        ];
        // Run Data Validation Rules
        $this->validate($request, $rules);
    }
}