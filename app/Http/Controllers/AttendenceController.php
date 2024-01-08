<?php

namespace App\Http\Controllers;

use App\Models\candidate;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendenceController extends Controller
{

    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('attendence.index')) {
            abort(403, 'Unauthorized');
        }
        return view('admin.attendence.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('attendence.create')) {
            abort(403, 'Unauthorized');
        }
        $companies = Company::latest()->get();
        $candidates = candidate::latest()->get();
        return view('admin.attendence.create', compact('companies', 'candidates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('attendence.store')) {
            abort(403, 'Unauthorized');
        }
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (is_null($this->user) || !$this->user->can('attendence.edit')) {
            abort(403, 'Unauthorized');
        }
        return view('admin.attendence.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (is_null($this->user) || !$this->user->can('attendence.update')) {
            abort(403, 'Unauthorized');
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (is_null($this->user) || !$this->user->can('attendence.destroy')) {
            abort(403, 'Unauthorized');
        }
        //
    }
}
