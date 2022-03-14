<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengurus;
use App\Models\Bidang;
use App\Models\Jabatan;
use App\Models\Anggota;
use Illuminate\Support\Facades\Storage;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengurus = Pengurus::all();
        $bidang = Bidang::select('kode', 'bidang')->get();
        $anggota = Anggota::all();
        return view('admin.pengurus', compact('pengurus', 'bidang', 'anggota'));
    }

    public function carijabatan(Request $request)
    {
        $bidang = Bidang::select('kode')->where('bidang', $request->kode)->first();
        $jabatan = Jabatan::where('kode_bidang', $bidang->kode)->get();
        foreach ($jabatan as $jbt) {
            echo "<option value='$jbt->jabatan'>$jbt->jabatan</option>";
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $filename = $request->nama . '.' . $request->foto->extension();
        $lokasi = public_path('assets/img/pengurus');
        $request->file('foto')->move($lokasi, $filename);

        $tambah = Pengurus::Create(
            [
                'nama' => $request->nama,
                'nim' => $request->nim,
                'bidang' => $request->bidang,
                'jabatan' => $request->jabatan,
                'periode' => $request->periode,
                'foto' => $filename
            ]
        );
        if ($tambah) {
            return redirect()->back()->with('success', 'Data Berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Data Gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $update = Pengurus::find($id);
        if ($request->hasFile('foto')) {
            $filename = $request->nama . '.' . $request->foto->extension();
            $lokasi = public_path('assets/img/pengurus');
            $request->file('foto')->move($lokasi, $filename);

            $update->update(
                [
                    'nama' => $request->nama,
                    'nim' => $request->nim,
                    'bidang' => $request->bidang,
                    'jabatan' => $request->jabatan,
                    'periode' => $request->periode,
                    'foto' => $filename
                ]
            );
        } else {
            $update->update(
                [
                    'nama' => $request->nama,
                    'nim' => $request->nim,
                    'bidang' => $request->bidang,
                    'jabatan' => $request->jabatan,
                    'periode' => $request->periode
                ]
            );
        }

        if ($update) {
            return redirect()->back()->with('success', 'Data Berhasil diupdate');
        } else {
            return redirect()->back()->with('error', 'Data Gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Pengurus::find($id);
        $hapus->delete();

        if ($hapus) {
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Data gagal dihapus');
        }
    }
}
