<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{

    public function admin_user()
    {

        return view('admin.home');
    }
    public function showUsers()
    {
        $user = DB::table('users as u')
            ->select(
                'u.id as id',
                'u.name as nama',
                'u.email as email',
                DB::raw("CASE WHEN u.usertype = 0 THEN 'Client' WHEN u.usertype = 1 THEN 'Perusahaan' ELSE 'Tipe Pengguna Tidak Valid' END as usertype")
            )
            ->where('u.id', '!=', auth()->user()->id)
            ->orderBy('u.id', 'desc')
            ->get();

        return DataTables::of($user)
            ->addColumn('action', function ($user) {
                $btn = '<a type="button" href="' . url('hapusUser') . "/" . $user->id . '" style="padding: 3px 20px" class="btn btn-secondary">Hapus</a>';
                return $btn;
            })
            ->make(true);
    }

    public function hapusUser($id)
    {
        $user = DB::table('users')->where('id', $id)->delete();

        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }

    public function admin_loker()
    {

        return view('admin.loker');
    }

    public function showLoker()
    {
        $lowongan = DB::table('lokers as l')
            ->join('companies as c', 'l.companyId', '=', 'c.id')
            ->select(
                'l.id as id',
                'c.user_id as userId',
                'c.image as logo',
                'l.companyId as companyId',
                'c.namaPerusahaan as NP',
                'l.judul as judul',
                'l.deskripsi as deskripsi',
                'l.gaji as gaji',
            )
            ->orderBy('id', 'desc')
            ->get();

        return DataTables::of($lowongan)
            ->addColumn('action', function ($lowongan) {
                $btn = '
            <a type="button" href="' . url('hapusLoker') . "/" . $lowongan->id . '" style="padding: 3px 20px" class="btn btn-secondary">Hapus</a>';
                return $btn;
            })
            ->make(true);
    }

    public function hapusLoker($id)
    {
        $loker = DB::table('lokers')->where('id', $id)->delete();

        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }

    public function showKandidat()  {
        $candidate = DB::table('candidates as c')
            ->join('users as u', 'c.userId', '=', 'u.id')
            ->join('lokers as l', 'c.lokerId', '=', 'l.id')
            ->join('companies as co', 'l.companyId', '=', 'co.id' )
            ->select(
                'c.id as id',
                'c.userId as userId',
                'c.cv as cv',
                'c.lokerId as lokerId',
                'co.namaPerusahaan as NP',
                'u.name as name',
                'l.judul as judul',
                'l.companyId as companyId',
                'c.created_at as tanggal'
            )
            ->orderBy('id', 'desc')
            ->get();

        return DataTables::of($candidate)
            ->addColumn('action', function ($candidate) {
                $btn = '
            <a type="button" href="' . url('hapusKandidat') . "/" . $candidate->id . '" style="padding: 3px 20px" class="btn btn-secondary">Hapus</a>';
                return $btn;
            })
            ->make(true);
    }

    public function admin_kandidat(){
        
        return view('admin.candidate');
    }

    public function hapusKandidat($id) {
        $candidate = DB::table('candidates')->where('id', $id)->delete();

        return redirect()->back()->with('message', "Data Berhasil dihapus");
    }

}
