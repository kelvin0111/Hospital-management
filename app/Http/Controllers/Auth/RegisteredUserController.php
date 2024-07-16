<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\DoctorsIdCode;
use App\Events\DoctorCreatedTime;

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
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'age' => ['nullable', 'integer', 'digits_between:1,3'],
            'gender' => ['nullable', 'string', 'in:male,female,others'],
            'country' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'regex:/^\+?[0-9]+$/'],
            'specialization' => ['nullable', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'id_number' => ['nullable', 'string', 'max:6'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($request->has('id_number')) {
            $getId = DoctorsIdCode::where('doctor_id_code', $request->id_number)->first();

            if (!$getId) {
                return redirect()->back()->with('error', 'Incorrect ID Number');
            }

            if ($getId) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'age' => $request->age,
                    'gender' => $request->gender,
                    'country' => $request->country,
                    'phone' => $request->phone,
                    'specialization' => $request->specialization,
                    'address' => $request->address,
                    'doctor' => 1,
                    'password' => Hash::make($request->password),
                ]);

                event(new DoctorCreatedTime($user));
            }
        }else{
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'gender' => $request->gender,
            'country' => $request->country,
            'phone' => $request->phone,
            'specialization' => $request->specialization,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);
    }
        event(new Registered($user));

        Auth::login($user);

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
