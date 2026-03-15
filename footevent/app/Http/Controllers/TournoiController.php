<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTournoiRequest;
use App\Models\Tournoi;
 use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TournoiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
    {
        $tournois = Tournoi::with('user')->get();
        return view('tournoi.index', compact('tournois'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tournoi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTournoiRequest $request)
    {
    $validated = $request->validated();
    $validated['user_id'] = Auth::id();
     
    Tournoi::create($validated);
    return redirect()->route('tournois.index')->with("success","Tournoi creer avec success");    
    }

    /**
     * Display the specified resource.
     */
    public function show(Tournoi $tournoi)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tournoi $tournoi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tournoi $tournoi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tournoi $tournoi)
    {
        //
    }
}
