<?php

/*
 * Project Name: Milestone 6
 * Version: 6.0
 * Programmers: Brian Cantrell
 * Date: 4/24/2021
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UpdateModel;
use App\Services\Business\AdminService;

class AdminController extends Controller
{
    public function index(Request $request) {
        $service = new AdminService();
        $users = $service->listUsers();
        $id = $request->session()->get('userId', null);
        if(!$id) return view('login');

        return view('admin')->with('users', $users);
    }
    public function edit(Request $request,$id) {
        $service = new AdminService();
        $user = $service->getEditableUser($id);
        if(isset($user)) {
            return view('userEdit')->with('user', $user);
        }
        $id = $request->session()->get('userId', null);
        if(!$id) return view('login');

        return redirect('index');
    }
    public function update(Request $request, $id) {
        $id = $request->session()->get('userId', null);
        if(!$id) return view('login');
        $firstName = $request->input('firstname');
        $lastName = $request->input('lastname');
        $email = $request->input('email');
        $role = $request->input('role');
        // suspended input either null or "on"
        $suspended = $request->input('suspended') == NULL ? false : true;

        $user = new UpdateModel($id, $email, $firstName, $lastName, $role, $suspended);
        // Perform operations to update user
        $service = new AdminService();
        $result = $service->updateUser($user);
        return redirect('admin');
    }
    public function delete(Request $request, $id) {
        $id = $request->session()->get('userId', null);
        if(!$id) return view('login');
        $service = new AdminService();
        $result = $service->deleteUser($id);
        return redirect('admin');
    }
}