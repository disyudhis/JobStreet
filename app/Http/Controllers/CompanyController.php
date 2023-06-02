<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class CompanyController extends Controller
{
     /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('compAuth.registerComp');
    }

    //  /**
    //  * Handle an incoming registration request.
    //  *
    //  * @throws \Illuminate\Validation\ValidationException
    //  */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'namaPerusahaan' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Company::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $company = Company::create([
            'nama' => $request->nama,
            'namaPerusahaan' => $request->namaPerusahaan,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($company));

        Auth::login($company);

        return redirect(RouteServiceProvider::HOME);
    }
}
