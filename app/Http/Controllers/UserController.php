<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Data\DAO;

class UserController extends Controller
{
    public function index($id)
    {
        $data = $this->loadData($id);
        return view('resume', $data);
    }

    public function loadEdit($id)
    {
        $data = $this->loadData($id);
        return view('resumeEdit', $data);
    }
 
    public function resumeAdd($id)
    {
        $userDAO = new DAO('users');
        $user = $userDAO->get($id);
        return view('resumeItemAdd', ['user' => $user]);
    }

    public function resumeEdit($id, $resumeItemId)
    {
        $userDAO = new DAO('users');
        $user = $userDAO->get($id);
        $resumeDAO = new DAO('resume_items');
        $resumeItem  = $resumeDAO->get($resumeItemId);
        $data = [
            'user' => $user,
            'item' => $resumeItem
        ];
        return view('resume-item-edit', $data);
    }
    public function addResumeItem(Request $request, $id)
    {
        $resumeDAO = new DAO('resume_items');
        $name = $request->input('name');
        $description = $request->input('description');
        $organization = $request->input('organization');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $type = $request->input('type');

        $res = $resumeDAO->create([
            'NAME' => $name,
            'DESCRIPTION' => $description,
            'ORGANIZATION' => $organization,
            'START_DATE' => $startDate,
            'END_DATE' => $endDate,
            'TYPE' => $type,
            'USER_ID' => $id
        ]);
        if ($res) {
            $data = $this->loadData($id);
            return view('resumeEdit', $data);
        } else {
            $this->loadAdd($id);
        }
    }
    public function updateResumeItem(Request $request, $id, $resumeItemId)
    {
        $id = $request->session()->get('userId', null);
        if(!$id) return view('login');

        $resumeDAO = new DAO('resume_items');

        $name = $request->input('name');
        $description = $request->input('description');
        $organization = $request->input('organization');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $type = $request->input('type');

        $res = $resumeDAO->update($resumeItemId, [
            'NAME' => $name,
            'DESCRIPTION' => $description,
            'ORGANIZATION' => $organization,
            'START_DATE' => $startDate,
            'END_DATE' => $endDate,
            'TYPE' => $type
        ]);

        if ($res) {
            return $this->loadEdit($id);
        }
    }
    public function deleteResumeItem($id, $resumeItemId)
    {
        $resumeDAO = new DAO('resume_items');
        $res = $resumeDAO->delete($resumeItemId);
        if ($res) {
            $data = $this->loadData($id);
            return view('resumeEdit', $data);
        }
    }

    public function loadAllProfiles(Request $request)
    {
        $id = $request->session()->get('userId', null);
        if(!$id) return view('login');

        $userDAO = new DAO('users');
        $users = $userDAO->list();
        return view('profiles', ['users' => $users]);
    }

    public function loadProfileEdit(Request $request, $id)
    {
        $id = $request->session()->get('userId', null);
        if(!$id) return view('login');

        $loggedInId = $request->session()->get('userId', null);
        if (!$loggedInId or ($loggedInId != $id)) return view('login');
        $userDAO = new DAO('users');
        $user = $userDAO->get($id);
        if (isset($user)) {
            return view('profileEdit')->with('user', $user);
        }
        return redirect('index');
    }
    public function applyProfileEdit(Request $request, $id)
    {
        $id = $request->session()->get('userId', null);
        if(!$id) return view('login');

        $firstName = $request->input('firstname');
        $lastName = $request->input('lastname');
        $email = $request->input('email');
        $joined = $request->input('joined');
        $country = $request->input('country');
        $pnumber = $request->input('pnumber');
        $userDAO = new DAO('users');
        $res = $userDAO->update($id, [
            'FIRSTNAME' => $firstName,
            'LASTNAME' => $lastName,
            'EMAIL' => $email,
            'JOINED' => $joined,
            'COUNTRY' => $country,
            'PNUMBER' => $pnumber,
        ]);
        if ($res) {
            return redirect()->action([UserController::class, 'loadNewEdit']);
        }
    }
    public function loadData($id)
    {
        $userDAO = new DAO('users');
        $user = $userDAO->get($id);
        $resumeItemsDAO = new DAO('resume_items');
        $resumeItems  = $resumeItemsDAO->list([
            'USER_ID' => $id
        ]);
        $talent = $resumeItems->filter(function ($item) {
            return $item->TYPE === 'TALENT';
        });
        $jobs = $resumeItems->filter(function ($item) {
            return $item->TYPE === 'JOB';
        });
        $education = $resumeItems->filter(function ($item) {
            return $item->TYPE === 'EDUCATION';
        });
        return [
            'user' => $user,
            'talent' => $talent,
            'jobs' => $jobs,
            'education' => $education
        ];
    }

    public function loadGroupsByUser(Request $request) {
        $id = $request->session()->get('userId', null);
        if(!$id) return view('login');

        $groupsDAO = new DAO('affinity_groups');
        $id = $request->session()->get('userId', null);
        if(!$id) return view('login');
        $groupUsersDAO = new DAO('affinity_group_users');

        $data = $groupsDAO->list();
        $modifiedGroups = array_map(function ($el) use ($id, $groupUsersDAO) {
            $usersGroups = $groupUsersDAO->list([['USER_ID', '=', $id], ['GROUP_ID', '=', $el->id]])->toArray();
            $el->JOINED = count($usersGroups) > 0;
            return $el;
        }, $data->toArray());

        return view('affinity-assign', ['groups' => $modifiedGroups, 'userId' => $id]);
    }

    public function tryProfile(Request $request)
    {
        $id = $request->session()->get('userId', null);
        if (!$id) return view('login'); 
        $data = $this->loadData($id);
        return view('profile', $data);
    }

    public function logout(Request $request)
    {
        session_start();
        $request->session()->forget('userId');
        session_destroy();
        return view('index');
    }
}
