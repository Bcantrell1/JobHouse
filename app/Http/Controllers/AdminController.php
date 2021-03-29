<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UpdateModel;
use App\Services\Business\AdminService;

class AdminController extends Controller
{
    public function index() {
        $service = new AdminService();
        $users = $service->listUsers();

        return view('admin')->with('users', $users);
    }
    public function edit($id) {
        $service = new AdminService();
        $user = $service->getEditableUser($id);
        if(isset($user)) {
            return view('userEdit')->with('user', $user);
        }
        return redirect('index');
    }
    public function update(Request $request, $id) {
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
    public function delete($id) {
        $service = new AdminService();
        $result = $service->deleteUser($id);
        return redirect('admin');
    }
}