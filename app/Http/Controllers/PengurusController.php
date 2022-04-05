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
        $pengurus = DB::table('pengurus')
            ->join('anggota', 'pengurus.nim', '=', 'anggota.nim')
            ->join('bidang', 'pengurus.id_bidang', '=', 'bidang.id')
            ->join('jabatan', 'pengurus.id_jabatan', '=', 'jabatan.id')
            ->select('pengurus.*', 'anggota.nama', 'anggota.foto', 'bidang.bidang', 'jabatan.jabatan')
            ->get();
        $bidang = Bidang::select('id', 'bidang')->get();
        return view('admin.pengurus.pengurus', compact('pengurus', 'bidang'));
    }

    public function carijabatan(Request $request)
    {
        // $bidang = Bidang::find($request->kode);
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
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required|string|max:100',
                'nim' => 'required|string|min:9|max:9',
                'periode' => 'required|string|max:4|min:4',
                // 'foto' => 'required|file|image|mimes:jpg|max:2048',
                'bidang' => 'required|string',
                'jabatan' => 'required|string'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // $filename = $request->nama . '.' . $request->foto->extension();
        // $lokasi = public_path('assets/img/pengurus');
        // $request->file('foto')->move($lokasi, $filename);

        $tambah = Pengurus::Create(
            [
                'nim' => $request->nim,
                'id_bidang' => $request->bidang,
                'id_jabatan' => $request->jabatan,
                'periode' => $request->periode,
                // 'foto' => $filename
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
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required|string|max:100',
                'nim' => 'required|string|min:9|max:9',
                'periode' => 'required|string|max:4|min:4',
                // 'foto' => 'file|image|mimes:jpg|max:2048',
                'bidang' => 'required|string',
                'jabatan' => 'required|string'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $update = Pengurus::find($id);
        // if ($request->hasFile('foto')) {
        //     $filename = $request->nama . '.' . $request->foto->extension();
        //     $lokasi = public_path('assets/img/pengurus/');
        //     File::delete($lokasi . $update->foto);
        //     $request->file('foto')->move($lokasi, $filename);

        //     $update->update(
        //         [
        //             'nim' => $request->nim,
        //             'id_bidang' => $request->bidang,
        //             'id_jabatan' => $request->jabatan,
        //             'periode' => $request->periode,
        //             'foto' => $filename
        //         ]
        //     );
        // } else {
        $update->update(
            [
                'nim' => $request->nim,
                'id_bidang' => $request->bidang,
                'id_jabatan' => $request->jabatan,
                'periode' => $request->periode
            ]
        );
        // }

        if ($update) {
            return redirect(route('pengurus'))->with('success', 'Data Berhasil diupdate');
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
        // File::delete('assets/img/pengurus' . $hapus->foto);
        $hapus->delete();

        if ($hapus) {
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Data gagal dihapus');
        }
    }
}
