<?php

use App\Models\Employee;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;

// function sidebar()
// {
//     $data['logos'] = Setting::first();
//     return $data;
// }

if (!function_exists('authRoleName'))
{
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

if (!function_exists('manager'))
{
    function manager()
    {
        $role = Role::select('id')->where('name', 'Manager')->first();

        $manager = Employee::select('id', 'employee_name')->where('roles_id', $role->id)->first();
        return $manager;
    }
}

if (!function_exists('teamLeaders'))
{
    function teamLeaders()
    {
        $role = Role::select('id')->where('name', 'Team Leader')->first();

        $teamLeaders = Employee::select('id', 'employee_name')->where('roles_id', $role->id)->get();
        return $teamLeaders;
    }
}
