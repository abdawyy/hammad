<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domain\Admin\Models\Admin;
use App\Domain\Admin\Requests\ForgotFormRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\URL;



class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {

        return view('admin.forget_password');

    }
    //@TODO CONTINUE RESETING PASSWORD FUNCTIONS
    public function sendResetLinkEmail(ForgotFormRequest $request)
    {
        Password::broker('admins')->sendResetLink(
            $request->only('email'),
            function ($user, string $token) {
                $url = URL::route('admin.password.reset', ['token' => $token, 'email' => $user->email]);
                $user->sendPasswordResetNotification($token, $url);
            }
        );

        return response()->json(['message' => 'Reset link sent']);
    }


}
