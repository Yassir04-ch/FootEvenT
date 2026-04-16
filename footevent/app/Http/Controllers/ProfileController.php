<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    
    public function edit(Request $request)
    {
        $user = Auth::user();
        return view('profile.edit',compact('user'));
    }

   
    public function update(UpdateProfileRequest $request)
    {
        dd($request);       
           
    }

   
    public function destroy(Request $request)
    {
       
    }
}
