<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Bidang;
use App\Models\Komentar;
use App\Models\Komentar2;

class PagesController extends Controller
{
    public function index()
    {
        $berita = Berita::join('bidang', 'berita.id_bidang', '=', 'bidang.id')
            ->select('berita.*', 'bidang.bidang')
            ->orderByDesc('berita.created_at')
            ->get();
        $x = 0;

        return view('users.index', compact('berita', 'x'));
    }

    public function caribidang($id)
    {
        // $cari = $request->cari;
        // dd($id);
        $berita = Berita::join('bidang', 'berita.id_bidang', '=', 'bidang.id')
            ->select('berita.*', 'bidang.bidang')
            ->where('bidang.bidang', $id)
            ->paginate(4);
        $bidang = Bidang::where('bidang', $id)->first();
        if (count($berita) > 0) {
            $x = 3;
            return view('users.index', compact('berita', 'x', 'bidang'));
        } else {
            $x = 4;
            return view('users.index', compact('x', 'bidang'));
        };
    }

    public function daftar()
    {
        return view('users.register');
    }
}
