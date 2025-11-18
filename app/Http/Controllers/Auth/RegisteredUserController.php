<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'gender' => ['nullable', 'in:male,female'],
            'birth_date' => ['nullable', 'date', 'before:today'],
            'religion' => ['nullable', 'in:islam,kristen,katolik,hindu,buddha,konghucu,lainnya'],
            'socioeconomic_status' => ['nullable', 'in:sangat_miskin,miskin,menengah_bawah,menengah,menengah_atas,kaya'],
            'education_level' => ['nullable', 'in:tidak_sekolah,sd,smp,sma,diploma,sarjana,pascasarjana'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Explicitly set role as regular user
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'religion' => $request->religion,
            'socioeconomic_status' => $request->socioeconomic_status,
            'education_level' => $request->education_level,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Redirect to home page for new regular users
        return redirect(route('home', absolute: false));
    }
}
