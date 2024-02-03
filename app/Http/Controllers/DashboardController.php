<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {


        $auth = Auth::user()->employe;
        $managers = [];
        $candidatesByManager = [];
        $consultents = [];
        $candidatesByConsultent = [];
        $team_leader = [];
        $candidatesByTeam = [];
        if ($auth->roles_id == 1) {
            $managers = Employee::where('roles_id', 4)->get();
            foreach ($managers as $manager) {
                $managerId = $manager->id;
                $candidatesForManager = Employee::getCandidatesForManager($managerId);
                $candidatesByManager[$managerId] = $candidatesForManager;
            }
        } elseif ($auth->roles_id == 4) {
            $team_leader = Employee::where('roles_id', 11)->get();
            foreach ($team_leader as $team) {
                $teamId = $team->id;
                $candidatesForTeam = Employee::getCandidatesForTeamLeader($teamId);
                $candidatesByTeam[$teamId] = $candidatesForTeam;
            }
        } elseif ($auth->roles_id == 11) {
            $consultents = Employee::where('roles_id', 8)->get();
            foreach ($consultents as $consultent) {
                $consultentId = $consultent->id;
                $candidatesForConsultent = Employee::getCandidatesForConsultent($consultentId);
                $candidatesByConsultent[$consultentId] = $candidatesForConsultent;
            }
        }

        // return $candidatesByManager;


        return view('admin.client.test', compact(
            'candidatesByManager',
            'managers',
            'candidatesByTeam',
            'team_leader',
            'candidatesByConsultent',
            'consultents'
        ));
    }
}
