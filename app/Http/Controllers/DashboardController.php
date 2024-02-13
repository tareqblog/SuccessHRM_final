<?php

namespace App\Http\Controllers;

use App\Enums\CalanderStatus;
use App\Models\Calander;
use App\Models\Dashboard;
use App\Models\Employee;
use Carbon\Carbon;
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

        $calander_datas = Calander::query();
        $activeResumes = Dashboard::with('candidate')->where('status', 0)->where('remark_id', 0);
        $followUp = Dashboard::with('candidate')->where('status', 0)->where('remark_id', 6)->where('follow_day', '>', 0)->get();
        $interviews = Dashboard::with('candidate')->where('status', 0)->where('remark_id', 4);
        $assignToClients = Dashboard::with('candidate')->where('status', 0)->where('remark_id', 5);
        $kivs = Dashboard::with('candidate')->where('status', 0)->where('remark_id', 7);
        $blackListed = Dashboard::with('candidate')->where('status', 0)->whereIn('remark_id', [2, 3, 8]);;
        // Initialize arrays to store groups
        $followUps[1] = [];
        $followUps[2] = [];
        $followUps[3] = [];
        $followUps[4] = [];
        $followUps[5] = [];
        $followUps[6] = [];

        $groupedFollowUps = $followUp->groupBy('follow_day');

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

        if ($auth->roles_id == 1) {
            $managers = Employee::where('roles_id', 4)->get();
            foreach ($managers as $manager) {
                $managerId = $manager->id;
                $candidatesForManager = Employee::getCandidatesForManager($managerId);
                $candidatesByManager[$managerId] = $candidatesForManager;
            }
        } elseif ($auth->roles_id == 4) {
            $calander_datas = $calander_datas->where('manager_id', $auth->id);
            $activeResumes = $activeResumes->where('manager_id', $auth->id);
            $interviews = $interviews->where('manager_id', $auth->id);
            $assignToClients = $assignToClients->where('manager_id', $auth->id);
            $kivs = $kivs->where('manager_id', $auth->id);

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
            $calander_datas = $calander_datas->where('team_leader_id', $auth->id);
            $activeResumes = $activeResumes->where('teamleader_id', $auth->id);
            $interviews = $interviews->where('consultent_id', $auth->id);
            $assignToClients = $assignToClients->where('consultent_id', $auth->id);
            $kivs = $kivs->where('consultent_id', $auth->id);
            $consultents = Employee::where('roles_id', 8)->where('team_leader_users_id', $auth->id)->get();
            foreach ($consultents as $consultent) {
                $consultentId = $consultent->id;
                $candidatesForConsultent = Employee::getCandidatesForConsultent($consultentId);
                $candidatesByConsultent[$consultentId] = $candidatesForConsultent;
            }
        } elseif ($auth->roles_id == 8) {
            $calander_datas = $calander_datas->where('consultant_id', $auth->id);
            $activeResumes = $activeResumes->where('consultent_id', $auth->id);
            $interviews = $interviews->where('consultent_id', $auth->id);
            $assignToClients = $assignToClients->where('consultent_id', $auth->id);
            $kivs = $kivs->where('consultent_id', $auth->id);
            $consultents = Employee::where('roles_id', 8)->where('team_leader_users_id', $auth->id)->get();
            foreach ($consultents as $consultent) {
                $consultentId = $consultent->id;
                $candidatesForConsultent = Employee::getCandidatesForConsultent($consultentId);
                $candidatesByConsultent[$consultentId] = $candidatesForConsultent;
            }
        }

        $c_datas = $calander_datas->get();
        $calander_datas = [];
        foreach ($c_datas as $key => $remark) {
            $calander_datas[] = [
                'id' => $remark->id,
                'candidate_remark_id' => $remark->candidate_remark_id,
                'candidate_remark_shortlist_id' => $remark->candidate_remark_shortlist_id,
                'title' => $remark->title,
                'date' => Carbon::parse($remark->date)->format('Y-m-d'),
                'allDay' => false,
                'url' => 'https://www.google.com.bd',
                'className' => 'bg-' . CalanderStatus::from($remark->status)->message(), // status
            ];
        }

        $interviews = $interviews->get();
        $assignToClients = $assignToClients->get();
        $kivs = $kivs->get();
        $activeResumes = $activeResumes->get();
        $blackListed = $blackListed->get();
        return view('admin.client.test', compact(
            'candidatesByManager',
            'calander_datas',
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

    public function change_dashboard_remark(Dashboard $dashboard, $id)
    {
        $follow_day = 0;
        if($id == 6)
        {
            $follow_day = ++$dashboard->follow_day;
        }
        $dashboard = $dashboard->update(['remark_id' => $id, 'follow_day' => $follow_day]);

        if (!$dashboard) {
            return redirect()->back()->with('error', 'Something Is Wrong!! Try Again.');
        }

        return redirect()->back()->with('success', 'Follow Up changed successfully.');
    }
}
