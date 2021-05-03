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

class AffinityGroupsController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->session()->get('userId', null);
        if(!$id) return view('login');
        if ($id) return redirect()->action([UserController::class, 'loadGroupsByUser']);
        $groupsDAO = new DAO('affinity_groups');
        $data = $groupsDAO->list();
        return view('affinity', ['groups' => $data]);
    }

    public function loadUsersGroups($id)
    {
        $groupsDAO = new DAO('affinity_groups');
        $callback = function ($value) {
            return $groupsDAO->get($value->GROUP_ID);
        };

        $userGroupsDAO = new DAO('affinity_group_users');
        $userGroupIds = $userGroupsDAO->list(['USER_ID' => $id]);
        $groups = array_map($callback, $userGroupIds);
        return $groups;
    }

    public function loadEdit(Request $request)
    {
        $id = $request->session()->get('userId', null);
        if(!$id) return view('login');
        $groupsDAO = new DAO('affinity_groups');
        $data = $groupsDAO->list();
        return view('affinity-groups-edit', ['groups' => $data]);
    }

    public function loadGroupEditor(Request $request, $groupId)
    {
        $id = $request->session()->get('userId', null);
        if(!$id) return view('login');
        $groupsDAO = new DAO('affinity_groups');
        $group  = $groupsDAO->get($groupId);
        $data = [
            'item' => $group
        ];
        return view('affinity-edit', $data);
    }


    public function updateGroup(Request $request, $groupId)
    {
        $groupsDAO = new DAO('affinity_groups');

        $name = $request->input('name');
        $description = $request->input('description');
        $type = $request->input('type');

        $res = $groupsDAO->update($groupId, [
            'NAME' => $name,
            'DESCRIPTION' => $description,
            'TYPE' => $type
        ]);

        if ($res) {
            return redirect()->action([AffinityGroupsController::class, 'loadEdit']);
        }
    }


    public function deleteGroup($id)
    {
        $groupsDAO = new DAO('affinity_groups');
        $res = $groupsDAO->delete($id);
        if ($res) {
            $groupsDAO = new DAO('affinity_groups');
            $data = $groupsDAO->list();
            return redirect()->action([AffinityGroupsController::class, 'loadEdit']);
        }
    }

    public function createGroup(Request $request)
    {
        $id = $request->session()->get('userId', null);
        if(!$id) return view('login');

        $name = $request->input('name');
        $description = $request->input('description');
        $type = $request->input('type');

        $groupsDAO = new DAO('affinity_groups');

        $res = $groupsDAO->create([
            'NAME' => $name,
            'DESCRIPTION' => $description,
            'TYPE' => $type
        ]);

        if ($res) {
            return redirect()->action([AffinityGroupsController::class, 'loadEdit']);
        }
        return redirect('affinity-create');
    }

    public function addUserToGroup(Request $request, $groupId, $userId)
    {
        $id = $request->session()->get('userId', null);
        if(!$id) return view('login');

        $groupUsersDAO = new DAO('affinity_group_users');
        $userDAO = new DAO('users');
        $groupsDAO = new DAO('affinity_groups');
        $user = $userDAO->get($userId);
        $group = $groupsDAO->get($groupId);
        $alreadyIn = $groupUsersDAO->list([[
            'USER_ID',
            '=',
            $userId
        ], [
            'GROUP_ID',
            '=',
            $groupId
        ]]);

        if (!$user or !$group or (count($alreadyIn) > 0)) {
            return redirect('affinity-groups');
        }

        $res = $groupUsersDAO->create([
            'USER_ID' => $userId,
            'GROUP_ID' => $groupId
        ]);

        if ($res) {
            return redirect()->action([UserController::class, 'loadGroupsByUser']);
        }
        return redirect('affinity-groups');
    }
    public function removeUserFromGroup(Request $request, $groupId, $userId)
    {
        $id = $request->session()->get('userId', null);
        if(!$id) return view('login');

        $groupUsersDAO = new DAO('affinity_group_users');
        $userDAO = new DAO('users');
        $groupsDAO = new DAO('affinity_groups');
        $user = $userDAO->get($userId);
        $group = $groupsDAO->get($groupId);
        $alreadyIn = $groupUsersDAO->list([[
            'USER_ID',
            '=',
            $userId
        ], [
            'GROUP_ID',
            '=',
            $groupId
        ]]);

        if (!$user or !$group or (count($alreadyIn) == 0)) {
            return redirect('affinity-groups');
        }

        $res = $groupUsersDAO->delete($alreadyIn[0]->id);

        if ($res) {
            return redirect()->action([UserController::class, 'loadGroupsByUser']);
        }
        return redirect('affinity-groups');
    }
}
