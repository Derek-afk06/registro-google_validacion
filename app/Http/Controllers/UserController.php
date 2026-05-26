<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    public function create()
    {
        $careers = Career::all();
        return view('register', compact('careers'));
    }

    // REGISTRO MANUAL 
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'career_id' => 'required|exists:careers,id',
            'terms_accepted' => 'required|accepted',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'career_id' => $request->career_id,
            'terms_accepted' => $request->has('terms_accepted'),
        ]);

        return redirect()->route('register')->with('success', 'Usuario registrado exitosamente');
    }

    // --- FLUJO EXCLUSIVO DE GOOGLE ---

    // Redirige a Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Recibe datos de Google y redirige a la ventana de carrera

    public function handleGoogleCallback()
{
    try {
        // Forzamos el uso de la clase Socialite directamente
        $googleUser = \Laravel\Socialite\Facades\Socialite::driver('google')->stateless()->user();
        
        // Guardamos en sesión
        session([
            'google_name' => $googleUser->getName(),
            'google_email' => $googleUser->getEmail(),
        ]);

        return redirect()->route('complete.profile');

    } catch (\Exception $e) {
        // En lugar de ocultar el error, vamos a verlo. 
        // Si sale algo en pantalla, cópialo y pégamelo aquí.
        dd($e->getMessage()); 
    }
}

    // Muestra la ventana de carrera y términos para los de Google
    public function showCompleteProfile() 
{
    // Obtiene todas las carreras de la BD
    $careers = \App\Models\Career::all(); 
    
    // Envía los datos a la vista
    return view('complete_profile', compact('careers')); 
}
    // Guarda el registro final del alumno que vino de Google
    public function storeGoogleUser(Request $request)
    {
        $request->validate([
            'career_id' => 'required|exists:careers,id',
            'terms_accepted' => 'required|accepted',
        ]);

        User::create([
            'name' => session('google_name'),
            'email' => session('google_email'),
            'password' => bcrypt('password_google_default'), // Password por defecto
            'career_id' => $request->career_id,
            'terms_accepted' => true,
        ]);

        session()->forget(['google_name', 'google_email']);

        return redirect('/')->with('success', '¡Registro completado exitosamente con Google!');
    }
}