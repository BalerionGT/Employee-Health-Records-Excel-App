<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "email"=>"required|email|exists:admins,email"
        ]);
        $token = Str::random(64);
        Db::table('password_reset_tokens')->insert([
            'email'=>$request->email,
            'token'=>$token,
            'created_at'=>Carbon::now(),
    
        ]);
        $action_link = route('password.reset',['token'=>$token,'email'=>$request->email]);
        $body = "We have received a request to reset the password for <b>Your app Name</b> account associated with " . $request->email . ". You can reset your password by clicking the link below";
        
        Mail::send('email-forgot',['action_link' => $action_link, 'body'=>$body], function($message) use ($request){
            $message->from('noreply@example.com','Your App Name');
            $message->to($request->email,'Your Name')
                    ->subject('Reset Password');
        });
        
        return back()->with('success', 'We have e-mailed your password reset link!');
    }
    }

