<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\UploadedFile as FileUploadedFile;

class CompanyController extends Controller
{
    /**
     * Display the registration view.
     */

    public function showDataPerusahaan(Company $company)
    {
        $user = Auth::user();
        $company = Company::where('user_id', $user->id)->first();
        $dataExists = ($company !== null);

        return view('company.settings', compact('dataExists'));
    }

    public function showProfile()
    {
        $status = DB::table('companies as c')
        ->select(
            'c.image as image',
            'c.namaPerusahaan as NP',
            'c.alamat as alamat',
            'c.phone as phone',
            'c.created_at as created_at'
        )
        ->where('c.user_id', '=', auth()->user()->id)
        ->get();

        return view('company.settings', compact('status'));
    }

    public function view_settings()
    {
        return view('company.settings');
    }

    public function view_dashboard()
    {
        return view('company.home');
    }

    public function storeProfile(Request $request)
    {
        $profile = new Company;
        $profile->user_id = auth()->user()->id;
        $profile->namaPerusahaan = $request->namaPerusahaan;
        $profile->address = $request->address;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
        $image = $request->image;
        if ($image instanceof FileUploadedFile) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('company', $imagename);
            $profile->image = $imagename;
        }

        $profile->save();
        return redirect()->back()->with('message', 'Data berhasil ditambahkan');
    }
}
