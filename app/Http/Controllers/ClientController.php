<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function getLowongan()
    {
        $lowongan = DB::table('lokers as l')
        ->join('companies as c', 'companyId', '=', 'c.id')
        ->select(
            'l.id as id',
            'c.image as logo',
            'l.judul as judul',
            'c.namaPerusahaan as NP',
            'c.address as alamat',
            'l.deskripsi as deskripsi',
            'l.gaji as gaji',
        )
        ->orderBy('id', 'desc')
        ->get();

        return view('client.home', compact('lowongan'));
    }

    public function show($id)
    {
        $loker = DB::table('lokers as l')
        ->join('companies as c', 'companyId', '=', 'c.id')
        ->select(
            'l.id as id',
            'c.image as logo',
            'l.judul as judul',
            'c.namaPerusahaan as NP',
            'c.email as email',
            'c.phone as phone',
            'c.address as alamat',
            'l.deskripsi as deskripsi',
            'l.gaji as gaji',
        )
        ->where('l.id', '=', $id)
        ->first();

        $user = DB::table('users as u')
        ->select(
            'id as id',
            'name as name',
            'email as email'
        )
        ->where('id', '=', auth()->user()->id)
        ->first();

        return view('client.inputcv', compact('loker', 'user'));
    }

    public function daftarPerusahaan(Request $request, $id)
    {
        $kandidat = new Candidate;
        $kandidat->userId = auth()->user()->id;
        $pdf = $request->cv;
        if($pdf instanceof UploadedFile && $pdf->getClientOriginalExtension() === 'pdf') {
            $pdfName = time(). '.' . $pdf->getClientOriginalExtension();
            $pdf->move('pdf', $pdfName);
            $kandidat->cv = $pdfName;
        }
        $kandidat->lokerId = $id;
        $kandidat->save();
        return redirect()->route('getLowongan')->with('message', 'Data berhasil ditambahkan');
    }


}
