<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserValidation;

class AuthController extends Controller
{
    public function getRegister()
    {
        return view('auth.register');
    }

    public function register(UserValidation $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'role' => $validated['role'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        // return response()->json([
        //     'access_token' => $token,
        //     'token_type' => 'Bearer',
        // ]);
        return redirect()->route('login');
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirection basée sur le rôle de l'utilisateur
            if ($user->role === 'admin') {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('idees.index');
            }
        }

        return back()->withErrors([
            'email' => 'Les informations d\'identification fournies sont incorrectes.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
