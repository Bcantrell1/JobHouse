<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Data\DAO;

class JobController extends Controller
{
    private $service;
    public function index(Request $request) {
        $id = $request->input('selected');
        $name = $request->input('name');
        $organization = $request->input('organization');



        $jobDAO = new DAO('job_postings');
        $userDAO = new DAO('users');

        $jobs = $jobDAO->list();
        $params = ['jobs' => $jobs, 'name' => '', 'organization' => ''];
        if($id) {
            $job = $jobDAO->get($id);
            $contact = $userDAO->get($job->USER_ID);
            // set parameters for selected item
            $params['selected'] = true;
            $params['item'] = $job;
            $params['item']->CONTACT = $contact->EMAIL;
        }

        // Figure out if we need to filter search results
        if($name) {
            $params['name'] = $name;
            $params['jobs'] = array_filter($jobs->toArray(), function($el) use ($name) {
                return strpos(strtolower($el->NAME), strtolower($name));
            });
        }
        if($organization) {
            $params['organization'] = $organization;
            $params['jobs']= array_filter($jobs->toArray(), function ($el) use ($organization) {
                return strpos(strtolower($el->INSTITUTION), strtolower($organization));
            });
        }

        return view('jobs', $params);
    }
    public function loadCreate(Request $request) {
         $id = $request->session()->get('userId', null);
         if(!$id) {
            return view('login');
         }
         return view('job-create');
    }
    public function createJob(Request $request) {
        $id = $request->session()->get('userId', null);
        $jobDAO = new DAO('job_postings');
        //variables
        $name = $request->input('name');
        $description = $request->input('description');
        $organization = $request->input('organization');
        $startDate = $request->input('startDate');
        $type = $request->input('type');

        $res = $jobDAO->create([
            'NAME' => $name,
            'DESCRIPTION' => $description,
            'ORGANIZATION' => $organization,
            'START_DATE' => $startDate,
            'TYPE' => $type,
            'USER_ID' => $id
        ]);

        if($res) {
            return redirect()->action([JobController::class, 'index']);
        }
        return view('job-create');
    }
    public function loadEdit(Request $request, $jobId) {
         $jobDAO = new DAO('job_postings');
         $job = $jobDAO->get($jobId);

         return view('job-edit', ['item' => $job]);
    }
    public function updateJob(Request $request, $jobId) {
        $jobDAO = new DAO('job_postings');

        $name = $request->input('name');
        $description = $request->input('description');
        $organization = $request->input('organization');
        $startDate = $request->input('startDate');
        $type = $request->input('type');

        $res = $jobDAO->update($jobId, [
            'NAME' => $name,
            'DESCRIPTION' => $description,
            'ORGANIZATION' => $organization,
            'START_DATE' => $startDate,
            'TYPE' => $type
        ]);

        if($res) {
            return redirect()->action([JobController::class, 'index']);
        }
    }
    public function deleteJob($jobId) {
        $jobDAO = new DAO('job_postings');
        $res = $jobDAO->delete($jobId);
        if($res) {
            return redirect()->action([JobController::class, 'index']);
        }
    }
}