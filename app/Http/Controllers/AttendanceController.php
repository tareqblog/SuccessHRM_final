<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function create(Request $request)
    {
        //
    }
    public function mystore(Request $request)
    {
         dd($request);
        try {

            $request->validate([
                'date' => 'required|array',
                'date.*' => 'date_format:Y-m-d',
            ]);

           
            $data=$request->group;
            foreach($data as $group){
            $att=new Attendance();
            $att->date=$group['date'];  
            $att->    
            $att->    
            $att->    
            $att->    
            $att->    
            $att->    
            $att->    
            $att->    
            $att->save();   

            }
            return redirect()->route('admin.dashboard');
         } catch (\Exception $e) {

             \Log::error('Error creating attendance: ' . $e->getMessage());

            
             return redirect()->route('attendence.create')->with('error', 'Failed to add attendance. Please try again.');
         }
    }
}
