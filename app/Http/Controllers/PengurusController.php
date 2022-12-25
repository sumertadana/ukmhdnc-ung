<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengurus;
use App\Models\Bidang;
use App\Models\Jabatan;
use App\Models\Anggota;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Pengurus::count() < 1) {
            $periodepilihan = "kosong";
        } else {
            $periodeterbaru = Pengurus::select('periode')->groupBy('periode')->latest()->first();
            $periodepilihan = $periodeterbaru->periode;
        }
        $periodes = Pengurus::select('periode')->groupBy('periode')->get();
        $pengurus = DB::table('pengurus')
            ->join('anggota', 'pengurus.nim', '=', 'anggota.nim')
            ->join('bidang', 'pengurus.id_bidang', '=', 'bidang.id')
            ->join('jabatan', 'pengurus.id_jabatan', '=', 'jabatan.id')
            ->select('pengurus.*', 'anggota.nama', 'bidang.bidang', 'jabatan.jabatan')
            ->where('pengurus.periode', $periodepilihan)
            ->get();
        $bidang = Bidang::select('id', 'bidang')->get();
        return view('admin.pengurus.pengurus', compact('pengurus', 'bidang', 'periodepilihan', 'periodes'));
    }

    public function periodepengurus($periodepilihan)
    {
        $periodes = Pengurus::select('periode')->groupBy('periode')->get();
        $pengurus = DB::table('pengurus')
            ->join('anggota', 'pengurus.nim', '=', 'anggota.nim')
            ->join('bidang', 'pengurus.id_bidang', '=', 'bidang.id')
            ->join('jabatan', 'pengurus.id_jabatan', '=', 'jabatan.id')
            ->select('pengurus.*', 'anggota.nama', 'bidang.bidang', 'jabatan.jabatan')
            ->where('pengurus.periode', $periodepilihan)
            ->get();
        $bidang = Bidang::select('id', 'bidang')->get();
        return view('admin.pengurus.pengurus', compact('pengurus', 'bidang', 'periodepilihan', 'periodes'));
    }

    public function carijabatan(Request $request)
    {
        $jabatan = Jabatan::where('id_bidang', $request->kode)->get();
        foreach ($jabatan as $jbt) {
            echo "<option value='$jbt->id'>$jbt->jabatan</option>";
        }
    }

    public function carianggota(Request $request)
    {
        $anggota = Anggota::where('nama', 'like', '%' . $request->nama . '%')->get();
        if (count($anggota) > 0) {
            return response($anggota);
        } else {
            return "nothing";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $bidang = Bidang::select('id', 'bidang')->get();
        return view('admin.pengurus.tambah-pengurus', compact('bidang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cekanggota = Anggota::where('nama', $request->nama)->where('nim', $request->nim)->get();
        if ($cekanggota->count() < 1) {
            return redirect()->back()->with('error', "Data anggota tidak ditemukan, silahkan tambahkan data anggota terlebih dahulu !!! ");
        }
        $cekpengurus = Pengurus::where('nim', $request->nim)->where('periode', $request->periode)->get();

        if ($cekpengurus->count() > 0) {
            return redirect()->back()->with('error', 'Data ' . $request->nama . ' pada pengurus periode ' . $request->periode . ' sudah ada, silahkan cek kembali!!!');
        }
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required|string|max:100',
                'nim' => 'required|string|min:9|max:9',
                'periode' => 'required|string|max:9|min:9',
                'foto' => 'required|file|image|mimes:jpg|max:500',
                'bidang' => 'required|string',
                'jabatan' => 'required|string'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Data Gagal Ditambahkan !!!');
        }

        $filename = $request->nama . $request->nim . '.' . $request->foto->extension();
        $lokasi = public_path('assets/img/pengurus');
        $request->file('foto')->move($lokasi, $filename);

        $tambah = Pengurus::Create(
            [
                'nim' => $request->nim,
                'id_bidang' => $request->bidang,
                'id_jabatan' => $request->jabatan,
                'periode' => $request->periode,
                'foto' => $filename
            ]
        );
        return redirect()->back()->with('success', 'Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $bidang = Bidang::select('id', 'bidang')->get();
        return view('users.pengurus', compact('bidang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bidang = Bidang::select('id', 'bidang')->get();
        $pengurus = DB::table('pengurus')
            ->join('anggota', 'pengurus.nim', '=', 'anggota.nim')
            ->join('bidang', 'pengurus.id_bidang', '=', 'bidang.id')
            ->join('jabatan', 'pengurus.id_jabatan', '=', 'jabatan.id')
            ->select('pengurus.*', 'anggota.nama', 'bidang.bidang', 'jabatan.jabatan')
            ->where('pengurus.id', $id)
            ->first();
        $jabatan = Jabatan::where('id_bidang', $pengurus->id_bidang)->get();
        return view('admin.pengurus.edit-pengurus', compact('pengurus', 'bidang', 'jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cekanggota = Anggota::where('nama', $request->nama)->where('nim', $request->nim)->get();
        if ($cekanggota->count() < 1) {
            return redirect()->back()->withInput()->with('error', "Data anggota tidak sesuai, mohon cek kembali !!! ");
        }
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required|string|max:100',
                'nim' => 'required|string|min:9|max:9',
                'periode' => 'required|string|max:9|min:9',
                'foto' => 'file|image|mimes:jpg|max:500',
                'bidang' => 'required|string',
                'jabatan' => 'required|string'
            ]
        );
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Data Gagal Diupdate !!!');
        }

        $update = Pengurus::find($id);
        if ($request->hasFile('foto')) {
            $filename = $request->nama . $request->nim . '.' . $request->foto->extension();
            $lokasi = public_path('assets/img/pengurus/');
            File::delete($lokasi . $update->foto);
            $request->file('foto')->move($lokasi, $filename);

            $update->update(
                [
                    'nim' => $request->nim,
                    'id_bidang' => $request->bidang,
                    'id_jabatan' => $request->jabatan,
                    'periode' => $request->periode,
                    'foto' => $filename
                ]
            );
        } else {
            $update->update(
                [
                    'nim' => $request->nim,
                    'id_bidang' => $request->bidang,
                    'id_jabatan' => $request->jabatan,
                    'periode' => $request->periode
                ]
            );
        }

        return redirect(route('pengurus'))->with('success', 'Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengurus = Pengurus::find($id);
        $path = public_path('assets/img/pengurus');
        File::delete($path . $pengurus->foto);
        $pengurus->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
