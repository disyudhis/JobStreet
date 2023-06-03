<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Symfony\Component\HttpFoundation\File\UploadedFile as FileUploadedFile;

class CompanyController extends Controller
{
    /**
     * Display the registration view.
     */
    public function view_settings()
    {
        $status = DB::table('companies as c')
        ->select(
            'c.image as image',
            'c.namaPerusahaan as NP',
            'c.address as address',
            'c.email as email',
            'c.phone as phone',
            'c.created_at as created_at'
        )
        ->where('c.user_id', '=', auth()->user()->id)
        ->get();

        return view('company.settings', compact('status'));
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

    public function tambahLowongan(Request $request)
    {
        $loker = new Loker;
        $loker->judul = $request->judul;
        $loker->deskripsi = $request->deskripsi;
        $loker->gaji = $request->gaji;
        $company = Company::where('user_id', Auth::user()->id)->first();
        $loker->companyId = $company->id;
        $loker->save();
        return redirect()->back()->with('message', 'Data berhasil ditambahkan');
    }

    public function getAllLowongan()
    {
        $lowongan = DB::table('lokers as l')
        ->join('companies as c', 'companyId', '=', 'c.id')
        ->select(
            'l.id as id',
            'c.image as logo',
            'l.judul as judul',
            'l.deskripsi as deskripsi',
            'l.gaji as gaji',
        )
        ->orderBy('id', 'desc')
        ->get();

        return DataTables::of($lowongan)
        ->addColumn('action', function($lowongan) {
            $btn = '<a type="button" href="' .url('') . "/" . $lowongan->id . '" style="padding: 3px 20px" class="btn btn-primary">Edit</a>
            <a type="button" href="' . url('') . "/" . $lowongan->id . '" style="padding: 3px 20px" class="btn btn-secondary">Hapus</a>';
            return $btn;
        })
        ->make(true);
    }
}
