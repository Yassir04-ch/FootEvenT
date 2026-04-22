<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use App\Service\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    private $service;
    
    public function __construct(ProfileService $service){
        $this->service = $service;
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        return view('profile.edit',compact('user'));
    }

   
    public function update(ProfileUpdateRequest $request){
        $user = Auth::user();
        $validated = $request->validated();
        $result = $this->service->updateProfile($user,$validated);
        if(!$result['success']){
         return back()->with('error',$result['message']);
        }
        return back()->with('success',$result['message']);
    }

   
}
