<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Data\DAO;

class UserController extends Controller
{
    public function index($id) {
        $data = $this->loadData($id);
        return view('cv', $data);
    }
    public function loadAllProfiles() {
        $userDAO = new DAO('users');
        $users = $userDAO->list();
        return view('profiles', ['users' => $users]);
    }

    public function loadProfileEdit(Request $request, $id) {
         $loggedInId = $request->session()->get('userId', null);
         if(!$loggedInId or ($loggedInId != $id)) return view('login');
         $userDAO = new DAO('users');
         $user = $userDAO->get($id);
        if(isset($user)) {
            return view('profileEdit')->with('user', $user);
        }
        return redirect('index');
    }
    public function applyProfileEdit(Request $request, $id) {
        $firstName = $request->input('firstname');
        $lastName = $request->input('lastname');
        $email = $request->input('email');
        $joined = $request->input('joined');
        $country = $request->input('country');
        $pnumber = $request->input('pnumber');
        $education = $request->input('education');
        $userDAO = new DAO('users');
        $res = $userDAO->update($id, [
            'FIRSTNAME' => $firstName,
            'LASTNAME' => $lastName,
            'EMAIL' => $email,
            'JOINED' => $joined,
            'COUNTRY' => $country,
            'PNUMBER' => $pnumber,
            'EDUCATION' => $education
        ]);
        if($res) {
            return redirect()->action([UserController::class, 'loadNewEdit']);
        }
    }
    public function loadData($id) {
        $userDAO = new DAO('users');
        $user = $userDAO->get($id);
        return [
            'user' => $user,
        ];
    }
    // New profile page makes use of the PHP session cookie.
    public function loadNewEdit(Request $request) {
        $id = $request->session()->get('userId', null);
         if(!$id) return view('login');
        $data = $this->loadData($id);
        return view('profile', $data);
    }
}