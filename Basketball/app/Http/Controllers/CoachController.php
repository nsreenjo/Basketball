<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all coaches
        $users = User::all();
        $coaches = Coach::with('user')->get();

        // Return the view with the list of coaches
        return view('dashboard.coaches.index', compact('coaches','users'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coach = Coach::find($id);
        $coach->delete();
        return redirect()->route('coaches.index');

    }
}
