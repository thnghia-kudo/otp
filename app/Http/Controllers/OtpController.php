<?php

namespace App\Http\OtpControllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

public function showOtpForm()
{
    if (Auth::user()->isActiveOtp()) {
        return redirect('home');
    }
    return view('auth.otp');
}

public function postOtp(Request $request)
{
    if ($request->get('otp', null) == Auth::user()->phone_code) {
        session()->put(['otp' => $request->otp]);

        return redirect('home');
    }

    return back()->withInput()->withErrors(['otp' => 'Wrong identity code.']);
}