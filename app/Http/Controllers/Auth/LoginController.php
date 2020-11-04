<?php

namespace App\Http\LoginControllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


public function authenticated(Request $request, $user)
{
    $code = str_random(6);
    $user->update([
        'phone_code' => $code,
    ]);

    return Nexmo::message()->send([
        'to'   => $user->phone,
        'from' => 'xxxxxxxx',
        'text' => "{$code} is your identity code."
    ]);
}