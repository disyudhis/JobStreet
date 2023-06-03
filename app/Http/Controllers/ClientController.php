<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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


}
