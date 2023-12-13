<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth; 
class Employee extends Model
{
    use HasFactory;

    protected $guarded = ['_token'];
    protected $fillable =[
        'id',
        'employee_outlet_id',
        'employee_code',
        'employee_name',
        'employee_phone',
        'employee_email',
        'passtypes_id',
        'employee_nric',
        'employee_mobile',
        'employee_tel',
        'employee_birthdate',
        'employee_joindate',
        'employee_confirmationdate',
        'employee_prdate',
        'employee_resigndate',
        'employee_resignreason',
        'employee_numberofchildren',
        'users_id',
        'manager_users_id',
        'team_leader_users_id',
        'employee_shrc',
        'employee_defination',
        'leave_aprv1_users_id',
        'leave_aprv2_users_id',
        'leave_aprv3_users_id',
        'claims_aprv1_users_id',
        'claims_aprv2_id',
        'claims_aprv3_users_id',
        'is_payroll_enable',
        'is_cpf_enable',
        'employee_isovertime',
        'paymodes_id',
        'employee_bank',
        'employee_bank_acc_no',
        'employee_bank_acc_title',
        'employee_street',
        'employee_unit_number',
        'employee_postal_code',
        'employee_street2',
        'employee_unit_number2',
        'employee_postal_code2',
        'employee_emr_contact',
        'employee_emr_relation',
        'employee_emr_phone1',
        'employee_emr_phone2',
        'employee_emr_address',
        'employee_emr_remarks',
        'departments_id',
        'designations_id',
        'employee_work_time_start',
        'employee_work_time_end',
        'employee_probation',
        'employee_extentionprobation',
        'employee_fw_permit_number',
        'employee_fw_application_date',
        'employee_fw_issue_date',
        'employee_fw_arrival_date',
        'employee_fw_renewal_date',
        'employee_fw_levy_amount',
        'races_id',
        'religions_id',
        'dbsexes_id',
        'marital_statuses_id',
        'clients_id',
        'employee_status',
        'employee_isDeleted',
        'created_by',
        'modify_by',
    ];

    public static function boot()
    {
        parent::boot();
        static::created(function ($Employee) {
           // $Employee->created_by = Auth::user()->id;
           // $Employee->save();
        });

        // Update field update_by with current user id each time article is updated.
        static::updating(function ($Employee) {
          //  $Employee->modify_by = Auth::user()->id;
           // $Employee->save();
        });
    }

    public function Department()
    {
        return $this->belongsTo('App\Models\Department');
    } 

    public function outlet()
    {
        return $this->belongsTo('App\Models\outlet');
    } 

    public function passtype()
    {
        return $this->belongsTo('App\Models\passtype');
    } 

    public function User()
    {
        return $this->belongsTo('App\Models\User');
    } 

    public function paymode()
    {
        return $this->belongsTo('App\Models\paymode');
    } 

    public function Designation()
    {
        return $this->belongsTo('App\Models\Designation');
    } 

    public function dbsex()
    {
        return $this->belongsTo('App\Models\dbsex');
    } 

    public function maritalStatus()
    {
        return $this->belongsTo('App\Models\maritalStatus');
    } 

    public function Race()
    {
        return $this->belongsTo('App\Models\Race');
    } 

    public function Religion()
    {
        return $this->belongsTo('App\Models\Religion');
    } 

}
