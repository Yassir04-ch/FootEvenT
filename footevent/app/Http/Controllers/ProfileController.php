<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {
        $uses = Auth::user();
        return view('profile.edit',compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update( $request)
    {
         
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
       
    }
}
