<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTournoiRequest;
use App\Http\Requests\UpdateTournoiRequest;
use App\Models\Tournoi;
use App\Service\TournoiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TournoiController extends Controller
{
    private $service;

    public function __construct(TournoiService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $tournois = $this->service->getAll($request);
        return view('tournoi.index', compact('tournois'));
    }


     public function create()
    {
        return view('tournoi.create');
    }

 
    public function store(StoreTournoiRequest $request)
    {
        $result = $this->service->create($request->validated(), Auth::id());
        return redirect()->route('tournois.index')->with('success', $result['message']);
    }


    public function show(Tournoi $tournoi)
    {
        $tournoi = $this->service->show($tournoi);
        return view('tournoi.show', compact('tournoi'));
    }


    public function edit(Tournoi $tournoi)
    {
        return view('tournoi.update', compact('tournoi'));
    }


    public function update(UpdateTournoiRequest $request, Tournoi $tournoi)
    {
        $result = $this->service->update($request->validated(), $tournoi, Auth::id());

        if (!$result['success']) {
            return back()->with('error', $result['message']);
        }

        return redirect()->route('tournois.show', $tournoi)->with('success', $result['message']);
    }


    public function destroy(Tournoi $tournoi)
    {
        $result = $this->service->delete($tournoi, Auth::id());

        if (!$result['success']) {
            return back()->with('error', $result['message']);
        }

        return redirect()->route('tournois.index')->with('success', $result['message']);
    }
}