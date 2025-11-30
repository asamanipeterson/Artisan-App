<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Mail\Welcome;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            return redirect(route('services.index'));
        } else {
            return redirect()->back()->onlyInput('email')->withErrors([
                'email' => 'Invalid credentials'
            ]);
        }
    }

    public function registerPage()
    {
        return view('auth.register');
    }

    public function register(AuthRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        } else {
            $data['image'] = null;
        }
        $data['user_type'] = 'user';

        // User::create($data);
        $user = User::create($data);
        Mail::to(
            $user->email
        )->send(new Welcome($user));

        return redirect(route('auth.login.page'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect(route('auth.login.page'))->with('success', 'You have been logged out successfully.');
    }
}
