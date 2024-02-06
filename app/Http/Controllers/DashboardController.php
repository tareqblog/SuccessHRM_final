<?php

namespace App\Http\Controllers;

use App\Models\Calander;
use App\Models\candidate;
use App\Models\Employee;
use App\Models\remarkstype;
use Carbon\Carbon;
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
        $followUps = [];
        $activeResume = [];
        $interviews = [];
        $blackListed = [];
        $assignToClients = [];
        $kivs = [];
        $activeResumes = [];

        // "id": 1,
        // "candidate_remark_id": 12,
        // "candidate_remark_shortlist_id": 1,
        // "title": "Contract Ending-",
        // "status": 4,
        // "date": "2024-04-30",
        // "created_at": "2024-02-06T12:44:52.000000Z",
        // "updated_at": "2024-02-06T12:44:52.000000Z"

        $calander_datas = Calander::get();
        $allRemarks = [];
        foreach ($calander_datas as $key => $remark) {
            $allRemarks[] = [
                'id' => $remark->id,
                'candidate_remark_id' => $remark->candidate_remark_id,
                'candidate_remark_shortlist_id' => $remark->candidate_remark_shortlist_id,
                'title' => $remark->title,
                'date' => Carbon::parse($remark->date)->format('Y-m-d'),
                'allDay' => false,
                'className' => 'bg-info' //status
            ];
        }

        // return $allRemarks;
        if ($auth->roles_id == 1) {
            $managers = Employee::where('roles_id', 4)->get();
            foreach ($managers as $manager) {
                $managerId = $manager->id;
                $candidatesForManager = Employee::getCandidatesForManager($managerId);
                $candidatesByManager[$managerId] = $candidatesForManager;
                $followUps = Employee::getCandidatesForManagerLatestRemark($managerId);
                $interviews = Employee::getCandidatesForManagerInterviews($managerId);
                $blackListed = Employee::getCandidatesForManagerblackListed($managerId);
                $assignToClients = Employee::getCandidatesForManagerassignToClient($managerId);
                $kivs = Employee::getCandidatesForManagerKIV($managerId);
                $activeResumes = Employee::getCandidatesForManagerActiveResumes($managerId);
            }
        } elseif ($auth->roles_id == 4) {
            $team_leader = Employee::where('roles_id', 11)->where('manager_users_id', $auth->id)->get();
            foreach ($team_leader as $team) {
                $teamId = $team->id;
                $candidatesForTeam = Employee::getCandidatesForTeamLeader($teamId);
                $candidatesByTeam[$teamId] = $candidatesForTeam;
                $consultents = Employee::where('roles_id', 8)->where('team_leader_users_id', $teamId)->get();
                foreach ($consultents as $consultent) {
                    $consultentId = $consultent->id;
                    $candidatesForConsultent = Employee::getCandidatesForConsultent($consultentId);
                    $candidatesByConsultent[$consultentId] = $candidatesForConsultent;
                }
            }
        } elseif ($auth->roles_id == 11) {
            $consultents = Employee::where('roles_id', 8)->where('team_leader_users_id', $auth->id)->get();
            foreach ($consultents as $consultent) {
                $consultentId = $consultent->id;
                $candidatesForConsultent = Employee::getCandidatesForConsultent($consultentId);
                $candidatesByConsultent[$consultentId] = $candidatesForConsultent;
            }
        }

        return view('admin.client.test', compact(
            'candidatesByManager',
            'allRemarks',
            'managers',
            'candidatesByTeam',
            'team_leader',
            'candidatesByConsultent',
            'consultents',
            'followUps',
            'interviews',
            'blackListed',
            'assignToClients',
            'kivs',
            'activeResumes',
        ));
    }
}
