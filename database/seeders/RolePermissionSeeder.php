<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAministrator = Role::create(['name' => 'Aministrator']);
        $roleHR = Role::create(['name' => 'HR']);
        $roleStaff = Role::create(['name' => 'Staff']);
        $roleManager = Role::create(['name' => 'Manager']);
        $roleCandidate = Role::create(['name' => 'Candidate']);
        $roleWalkInApplicant = Role::create(['name' => 'WalkInApplicant']);
        $rolePayroll = Role::create(['name' => 'Payroll']);
        $roleConsultant = Role::create(['name' => 'Consultant']);
        $roleClientEmployee = Role::create(['name' => 'Client Employee']);
        $roleRemarkInchargePerson = Role::create(['name' => 'Remark In-charge Person']);
        $roleTeamLeader = Role::create(['name' => 'Team Leader']);
        $roleInternship = Role::create(['name' => 'Internship']);
        $rolePayrollManager = Role::create(['name' => 'Payroll Manager']);
        $rolePayrollSupervisor = Role::create(['name' => 'Payroll Supervisor']);


        // Permission List as array
        $permissions = [

            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'admin.dashboard',
                ]
            ],
            [
                'group_name' => 'candidate',
                'permissions' => [
                    'candidate.index',
                    'candidate.store',
                    'candidate.create',
                    'candidate.family',
                    'candidate.family.delete',
                    'candidate.file.delete',
                    'candidate.file.upload',
                    'candidate.followup',
                    'candidate.followup.delete',
                    'candidate.payroll',
                    'candidate.remark',
                    'candidate.remark.delete',
                    'candidate.resume',
                    'candidate.resume.delete',
                    'candidate.working.hour',
                    'candidate.show',
                    'candidate.update',
                    'candidate.destroy',
                    'candidate.edit',
                ]
            ],
            [
                'group_name' => 'client-term',
                'permissions' => [
                    'client-term.index',
                    'client-term.store',
                    'client-term.create',
                    'client-term.show',
                    'client-term.update',
                    'client-term.destroy',
                    'client-term.edit',
                    'client-term.followup',
                    'client-term.followup.delete',
                ]
            ],
            [
                'group_name' => 'clients',
                'permissions' => [
                    'clients.index',
                    'clients.store',
                    'clients.show',
                    'clients.create',
                    'clients.update',
                    'clients.destory',
                    'clients.edit',
                    'client.file.delete',
                    'client.file.upload',
                ]
            ],
            [
                'group_name' => 'menu',
                'permissions' => [
                    'menu.index',
                    'menu.store',
                    'menu.create',
                    'menu.show',
                    'menu.update',
                    'menu.destory',
                    'menu.edit',
                ]
            ],
            [
                'group_name' => 'department',
                'permissions' => [
                    'department.index',
                    'department.store',
                    'department.create',
                    'department.show',
                    'department.update',
                    'department.destroy',
                    'department.edit',
                ]
            ],
            [
                'group_name' => 'designation',
                'permissions' => [
                    'designation.index',
                    'designation.store',
                    'designation.create',
                    'designation.show',
                    'designation.update',
                    'designation.destroy',
                    'designation.edit',
                ]
            ],
            [
                'group_name' => 'employee',
                'permissions' => [
                    'employee.index',
                    'employee.store',
                    'employee.create',
                    'employee.show',
                    'employee.update',
                    'employee.destory',
                    'employee.edit',
                ]
            ],
            [
                'group_name' => 'file-type',
                'permissions' => [
                    'file-type.index',
                    'file-type.store',
                    'file-type.create',
                    'file-type.show',
                    'file-type.update',
                    'file-type.destroy',
                    'file-type.edit',
                ]
            ],
            [
                'group_name' => 'import',
                'permissions' => [
                    'import.index',
                    'import.store',
                    'import.create',
                    'import.update',
                    'import.show',
                    'import.edit',
                ]
            ],
            [
                'group_name' => 'industry-type',
                'permissions' => [
                    'industry-type.index',
                    'industry-type.store',
                    'industry-type.create',
                    'industry-type.show',
                    'industry-type.update',
                    'industry-type.destroy',
                    'industry-type.edit',
                ]
            ],
            [
                'group_name' => 'job',
                'permissions' => [
                    'job.index',
                    'job.store',
                    'job.create',
                    'job.show',
                    'job.update',
                    'job.destory',
                    'job.edit',
                ]
            ],
            [
                'group_name' => 'job-category',
                'permissions' => [
                    'job-category.index',
                    'job-category.store',
                    'job-category.create',
                    'job-category.show',
                    'job-category.update',
                    'job-category.destroy',
                    'job-category.edit',
                ]
            ],
            [
                'group_name' => 'job-type',
                'permissions' => [
                    'job-type.index',
                    'job-type.store',
                    'job-type.create',
                    'job-type.show',
                    'job-type.update',
                    'job-type.destroy',
                    'job-type.edit',
                ]
            ],
            [
                'group_name' => 'leave',
                'permissions' => [
                    'leave.index',
                    'leave.store',
                    'leave.create',
                    'leave.show',
                    'leave.update',
                    'leave.destroy',
                    'leave.edit',
                ]
            ],
            [
                'group_name' => 'leave-type',
                'permissions' => [
                    'leave-type.index',
                    'leave-type.store',
                    'leave-type.create',
                    'leave-type.show',
                    'leave-type.update',
                    'leave-type.destory',
                    'leave-type.edit',
                ]
            ],
            [
                'group_name' => 'marital-status',
                'permissions' => [
                    'marital-status.index',
                    'marital-status.store',
                    'marital-status.create',
                    'marital-status.show',
                    'marital-status.update',
                    'marital-status.destory',
                    'marital-status.edit',
                ]
            ],
            [
                'group_name' => 'religion',
                'permissions' => [
                    'religion.index',
                    'religion.store',
                    'religion.create',
                    'religion.show',
                    'religion.update',
                    'religion.destroy',
                    'religion.edit',
                ]
            ],
            [
                'group_name' => 'roles',
                'permissions' => [
                    'roles.index',
                    'roles.store',
                    'roles.create',
                    'roles.show',
                    'roles.update',
                    'roles.destroy',
                    'roles.edit',
                ]
            ],
            [
                'group_name' => 'tnc',
                'permissions' => [
                    'tnc.index',
                    'tnc.store',
                    'tnc.create',
                    'tnc.show',
                    'tnc.update',
                    'tnc.destory',
                    'tnc.edit',
                ]
            ],
            [
                'group_name' => 'users',
                'permissions' => [
                    'users.index',
                    'users.store',
                    'users.create',
                    'users.show',
                    'users.update',
                    'users.destory',
                    'users.edit',
                ]
            ],
        ];

        // Create and Assign Permissions
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                // Create Permission
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
                $roleAministrator->givePermissionTo($permission);
                $permission->assignRole($roleAministrator);
            }
        }
    }
}
