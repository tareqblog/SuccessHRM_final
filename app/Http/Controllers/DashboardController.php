<?php

namespace App\Http\Controllers;

use App\Enums\CalanderStatus;
use App\Models\Calander;
use App\Models\candidate;
use App\Models\Dashboard;
use App\Models\Employee;
use App\Models\remarkstype;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    private function followUp()
    {
    }

    public function index()
    {
        $auth = Auth::user()->employe;
        $managers = [];
        $candidatesByManager = [];
        $consultents = [];
        $candidatesByConsultent = [];
        $team_leader = [];
        $candidatesByTeam = [];
        $interviews = [];
        $blackListed = [];
        $assignToClients = [];
        $kivs = [];
        $activeResumes = Dashboard::with('candidate')->where('status', 0)->where('followup_id', 0);
        $calander_datas = Calander::query();

        $followUp = Dashboard::with('candidate')->where('status', 0)->get();

        // Initialize arrays to store groups
        $followUps[1] = [];
        $followUps[2] = [];
        $followUps[3] = [];
        $followUps[4] = [];
        $followUps[5] = [];
        $followUps[6] = [];

        // Group the followUps by follow_day
        $groupedFollowUps = $followUp->groupBy('follow_day');

        // Iterate over the groups and assign them to different arrays
        foreach ($groupedFollowUps as $followDay => $group) {
            switch ($followDay) {
                case 0:
                    break;
                case 1:
                    $followUps[1] = $group->all();
                    break;
                case 2:
                    $followUps[2] = $group->all();
                    break;
                case 3:
                    $followUps[3] = $group->all();
                    break;
                case 4:
                    $followUps[4] = $group->all();
                    break;
                case 5:
                    $followUps[5] = $group->all();
                    break;
                default:
                    $followUps[6] = array_merge($followUps[6], $group->all());
                    break;
            }
        }

        // $followUps = Dashboard::where('status', 0)
        //     ->selectRaw('follow_day,
        //             CASE
        //                 WHEN follow_day = 1 THEN "Day 1"
        //                 WHEN follow_day = 2 THEN "Day 2"
        //                 WHEN follow_day = 3 THEN "Day 3"
        //                 WHEN follow_day = 4 THEN "Day 4"
        //                 WHEN follow_day = 5 THEN "Day 5"
        //                 WHEN follow_day > 5 THEN "More Then Five Day"
        //             END AS group_day')
        //     ->groupBy('follow_day', 'group_day')
        //     ->get();

        // return $followUps;
        // return $allRemarks;
        if ($auth->roles_id == 1) {
            $calander_datas = $calander_datas->get();
            $managers = Employee::where('roles_id', 4)->get();
            // foreach ($managers as $manager) {
            //     $managerId = $manager->id;
            //     $candidatesForManager = Employee::getCandidatesForManager($managerId);
            //     $candidatesByManager[$managerId] = $candidatesForManager;
            //     $followUps = Employee::getCandidatesForManagerLatestRemark($managerId);
            //     $interviews = Employee::getCandidatesForManagerInterviews($managerId);
            //     $blackListed = Employee::getCandidatesForManagerblackListed($managerId);
            //     $assignToClients = Employee::getCandidatesForManagerassignToClient($managerId);
            //     $kivs = Employee::getCandidatesForManagerKIV($managerId);
            //     $activeResumes = Employee::getCandidatesForManagerActiveResumes($managerId);
            // }
        } elseif ($auth->roles_id == 4) {
            $calander_datas = $calander_datas->where('manager_id', $auth->id)->get();
            $activeResumes = $activeResumes->where('manager_id', $auth->id);
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
            $calander_datas = $calander_datas->where('team_leader_id', $auth->id)->get();
            $activeResumes = $activeResumes->where('teamleader_id', $auth->id);
            $consultents = Employee::where('roles_id', 8)->where('team_leader_users_id', $auth->id)->get();
            foreach ($consultents as $consultent) {
                $consultentId = $consultent->id;
                $candidatesForConsultent = Employee::getCandidatesForConsultent($consultentId);
                $candidatesByConsultent[$consultentId] = $candidatesForConsultent;
            }
        } elseif ($auth->roles_id == 8) {
            $calander_datas = $calander_datas->where('consultant_id', $auth->id)->get();
            $activeResumes = $activeResumes->where('consultent_id', $auth->id);
            $consultents = Employee::where('roles_id', 8)->where('team_leader_users_id', $auth->id)->get();
            foreach ($consultents as $consultent) {
                $consultentId = $consultent->id;
                $candidatesForConsultent = Employee::getCandidatesForConsultent($consultentId);
                $candidatesByConsultent[$consultentId] = $candidatesForConsultent;
            }
        }

        $allRemarks = [];
        foreach ($calander_datas as $key => $remark) {
            $allRemarks[] = [
                'id' => $remark->id,
                'candidate_remark_id' => $remark->candidate_remark_id,
                'candidate_remark_shortlist_id' => $remark->candidate_remark_shortlist_id,
                'title' => $remark->title,
                'date' => Carbon::parse($remark->date)->format('Y-m-d'),
                'allDay' => false,
                'url' => 'https://www.google.com.bd',
                'className' => 'bg-' . CalanderStatus::from($remark->status)->message(), //status
            ];
        }

        $activeResumes = $activeResumes->get();
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
