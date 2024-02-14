<?php

use App\Models\Dashboard;
use App\Models\Employee;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

if (!function_exists('authRoleName')) {
    function authRoleName()
    {
        $roleName = '';
        $user = auth()->user();
        if ($user) {
            $roleName = $user->roleName($user->role);
        }
        return $roleName;
    }
}

if (!function_exists('manager')) {
    function manager()
    {
        $role = Role::select('id')->where('name', 'Manager')->first();

        $manager = Employee::select('id', 'employee_name')->where('roles_id', $role->id)->first();
        return $manager;
    }
}
if (!function_exists('manager_for_client')) {
    function manager_for_client()
    {
        $role = Role::select('id')->where('name', 'Manager')->first();

        $manager = Employee::select('id', 'employee_name')->where('roles_id', $role->id)->get();
        return $manager;
    }
}

if (!function_exists('teamLeaders')) {
    function teamLeaders()
    {
        $role = Role::select('id')->where('name', 'Team Leader')->first();

        $teamLeaders = Employee::select('id', 'employee_name')->where('roles_id', $role->id)->get();
        return $teamLeaders;
    }
}

if (!function_exists('candidate_group')) {
    function candidate_group($candidate_id)
    {
        $dashboard = Dashboard::where('candidate_id', $candidate_id)->first();

        return ($dashboard->manager->employee_code ?? '') . '/' . ($dashboard->teamleader->employee_code ?? '') . '/' . ($dashboard->consultent->employee_code ?? '');
    }
}

if (!function_exists('assign_dashboard_remark_id')) {
    function assign_dashboard_remark_id($id)
    {
        $data = [];
        $data['follow_day'] = 0;
        if($id == 1 || $id == 2 || $id == 3 || $id == 9 || $id == 10 || $id == 11 || $id == 12) {
            $data['remark_id'] = 0;
        } elseif ($id == 4) {
            $data['remark_id'] = 6;
        } elseif ($id == 5) {
            $data['remark_id'] = 4;
        } elseif ($id == 6) {
            $data['remark_id'] = 5;
        }

        return $data;
    }
}
if (!function_exists('get_team')) {
    function get_team($emp_id)
    {
        $emp = Employee::find($emp_id);
        $data = [];
        $data['manager_id'] =  null;
        $data['team_leader_id'] =  null;
        $data['consultant_id'] =  null;
        if($emp->roles_id == 4){
            $data['manager_id'] = $emp->id;
        } elseif($emp->roles_id == 11) {
            $data['manager_id'] =  $emp->manager_users_id;
            $data['team_leader_id'] =  $emp->id;
        } elseif($emp->roles_id == 8) {
            $data['manager_id'] =  $emp->manager_users_id;
            $data['team_leader_id'] =  $emp->team_leader_users_id;
            $data['consultant_id'] =  $emp->id;
        }

        return $data;
    }
}
