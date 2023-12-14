<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\DeshboardMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Auth;

class DeshboardMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = DeshboardMenu::all();
        return view('admin.dashboardMenu.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $menu_perent = DeshboardMenu::where('menu_group', $request->menu_group)->first();
        DeshboardMenu::create($request->except('_token') + [
            'userRole_id' => auth()->id(),
            'menu_perent' => $menu_perent->id
        ]);
        return redirect()->route('menu.index')->with('success', 'Successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DeshboardMenu $deshboardMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeshboardMenu $menu)
    {
        return view('admin.dashboardMenu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DeshboardMenu $menu)
    {
        $menu_perent = DeshboardMenu::where('menu_group', $request->menu_group)->first();
        $menu->update($request->except('_token') + [
            'menu_perent' => $menu_perent->id
        ]);
        return redirect()->route('menu.index')->with('success', 'Successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeshboardMenu $menu)
    {
        $menu->delete();
        return back()->with('success', 'Successfully deleted.');
    }
}
