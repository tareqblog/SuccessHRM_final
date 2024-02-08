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
    function assign_dashboard_remark_id($id, $remark)
    {
        $remark_id = 0;

        if ($id == 4) {
            $remark_id = 6;
        } elseif ($id == 5) {
            $remark_id = 4;
        } elseif ($id == 6) {
            $remark_id = 5;
        }

        $keep_in_view = 'keep in view';
        $not_suitable = 'not suitable';
        $blacklist = 'blacklist';
        $faj = 'found a job';

        if (Str::contains(strtolower($remark), strtolower($keep_in_view))) {
            $remark_id = 7;
        }

        if (Str::contains(strtolower($remark), strtolower($not_suitable))) {
            $remark_id = 3;
        }
        if (Str::contains(strtolower($remark), strtolower($blacklist))) {
            $remark_id = 8;
        }
        if (Str::contains(strtolower($remark), strtolower($faj))) {
            $remark_id = 2;
        }

        return $remark_id;
    }
}
