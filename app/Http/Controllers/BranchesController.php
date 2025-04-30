<?php

namespace App\Http\Controllers;

use App\Models\Branches;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BranchesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->role != 'Administrador') {
            return redirect()->route('start');
        }
        $branches = Branches::all();
        return view('modules.users.branches', compact('branches'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Branches::create([
            'name' => $request->name,
            'state' => 1,
        ]);

        return redirect()->route('branches.index')->with('success', 'Sucursal creada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Branches $branches)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_branch)
    {
        $branch = Branches::find($id_branch);
        return response()->json($branch);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        Branches::where('id', $request->id)->update([
            'name' => $request->name
        ]);

        return redirect()->route('branches.index')->with('success', 'Sucursal actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branches $branches)
    {
        //
    }

    public function chageState($state, $id_branch)
    {
        Branches::where('id', $id_branch)->update([
            'state' => $state
        ]);

        return redirect()->route('branches.index')->with('success', 'Estado actualizado con éxito');
    }
}
