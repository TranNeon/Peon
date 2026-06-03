<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use \App\UserRole;

class authController extends Controller
{
    public function loginView(){
        return view("auth.login");
    }

    public function registerView(){
        return view("auth.register");
    }


    public function registerFn(Request $request){
        $validate = $request->validate(['email'=>'required', 'password'=>'required', 'name'=>'required']);
        $explosion = explode( '@', $request->email);
        $domain = end ( $explosion );

        $role = match (true) {
            $domain === "reviewer.post3.com" => UserRole::REVIEWER,
            $domain === 'admin.post3.com' => UserRole::ADMIN,
            default => UserRole::USER,
        };

        //spatie role
        $user = User::create(['name' => $request->name,
            'email' => $request->email, 'password' => Hash::make($request->password)]);
            $spatieRole = match (true) {
            $domain === "reviewer.post3.com" => $user->assignRole('reviewer') ,
            $domain === 'admin.post3.com' => $user->assignRole('admin'),
            default => $user->assignRole('user'),
        };
        return redirect("/");
    }

    /**
     * Handle an authentication attempt.
     */
    public function loginFn(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
