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
    public function view_settings(Company $companies)
    {
        // $companies = Company::get();
        $companies = DB::table('companies as c')
            ->select(
                'c.id as id',
                'c.user_id as user_id',
                'c.image as image',
                'c.namaPerusahaan as NP',
                'c.address as address',
                'c.email as email',
                'c.phone as phone',
                'c.created_at as created_at'
            )
            ->where('c.user_id', '=', auth()->user()->id)
            ->first();

        return view('company.settings', compact('companies'));
    }

    public function view_dashboard()
    {
        return view('company.home');
    }

    public function storeProfile(Request $request, $id)
    {
        $profile = new Company;
        $profile->user_id = $id;
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

        return redirect()->route('dashboard_company', auth()->user()->id)->with('message', 'Data berhasil ditambahkan');
    }

    public function getAllLowongan()
    {
        $lowongan = DB::table('lokers as l')
            ->join('companies as c', 'l.companyId', '=', 'c.id')
            ->select(
                'l.id as id',
                'c.user_id as userId',
                'c.image as logo',
                'l.companyId as companyId',
                'l.judul as judul',
                'l.deskripsi as deskripsi',
                'l.gaji as gaji',
            )
            ->where('c.user_id', '=', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->get();

        return DataTables::of($lowongan)
            ->addColumn('action', function ($lowongan) {
                $btn = '<a type="button" href="' . url('edit') . "/" . $lowongan->id . '" style="padding: 3px 20px" class="btn btn-primary">Edit</a>
            <a type="button" href="' . url('destroy') . "/" . $lowongan->id . '" style="padding: 3px 20px" class="btn btn-secondary">Hapus</a>';
                return $btn;
            })
            ->make(true);
    }

    public function destroy($id)
    {
        $loker = DB::table('lokers')->where('id', $id)->delete();

        return redirect()->route('dashboard_company', auth()->user()->id)->with('message', "Data Berhasil dihapus");
    }

    public function edit(Loker $loker)
    {
        return view('company.edit', compact('loker'));
    }

    public function update(Request $request, Loker $loker)
    {
        $request->validate([
            'judul' => ['required'],
            'deskripsi' => ['required'],
            'gaji' => ['required']
        ]);

        $loker->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gaji' => $request->gaji
        ]);

        return redirect()->route('dashboard_company', auth()->user()->id)->with('message', "Data berhasil ditambahkan");
    }
}
