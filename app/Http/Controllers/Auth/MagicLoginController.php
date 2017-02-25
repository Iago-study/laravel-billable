<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UserToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MagicLoginController extends Controller
{
    public function show()
    {
        return view('auth.magic.login');
    }

    /**
     * Validate that the email has a valid format and exists in the users table
     * in the email column
     */
    public function sendToken(Request $request, UserToken $userToken)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255|exists:users,email'
        ]);

        $userToken->storeToken($request);
        $userToken->sendMail($request);

        return back()->with('success', 'We\'ve sent you a magic link! The link expires in 5 minutes');
    }

    public function authenticate(Request $request, UserToken $token)
    {
        if ($token->isExpired()) {
            $token->delete();
            return redirect('/login/magiclink')->with('error', 'That magic link has expired.');
        }

        if (!$token->belongsToUser($request->email)) {
            $token->delete();
            return redirect('/login/magiclink')->with('error', 'Invalid magic link.');
        }

        Auth::login($token->user, $request->get('remember'));
        $token->delete();
        return redirect('home');

    }



}
