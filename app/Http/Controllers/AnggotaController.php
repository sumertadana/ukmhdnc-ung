<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use DataTables;
use App\Models\Fakultas;
use App\Models\Jurusan;
use App\Models\Pengurus;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = Anggota::join('fakultas', 'anggota.id_fakultas', '=', 'fakultas.id')
            ->join('jurusan', 'anggota.id_jurusan', '=', 'jurusan.id')
            ->select('anggota.*', 'fakultas.fakultas', 'fakultas.singkatan', 'jurusan.jurusan')
            ->orderByDesc('angkatan')->get();
        $fakultas = Fakultas::select('id', 'fakultas', 'singkatan')->get();
        return view('admin.anggota.anggota', compact('anggota', 'fakultas'));
    }

    public function carijurusan(Request $request)
    {
        $jurusan = Jurusan::where('id_fakultas', $request->kode)->get();
        foreach ($jurusan as $jrs) {
            echo "<option value='$jrs->id'>$jrs->jurusan</option>";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fakultas = Fakultas::select('id', 'fakultas')->get();
        return view('admin.anggota.tambah-anggota', compact('fakultas'));
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
                'nim' => 'required|string|min:9|max:9|unique:anggota',
                'fakultas' => 'required|string',
                'jurusan' => 'required|string',
                'angkatan' => 'required|string|min:4|max:4',
                'hp' => 'max:14',
                'alamat' => 'required|string',
                'status' => 'required|string'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Data Gagal Ditambahkan !!!');
        }

        $tambah = Anggota::Create(
            [
                'nama' => $request->nama,
                'nim' => $request->nim,
                'id_fakultas' => $request->fakultas,
                'id_jurusan' => $request->jurusan,
                'angkatan' => $request->angkatan,
                'hp' => $request->hp,
                'jk' => $request->jk,
                'alamat' => $request->alamat,
                'status' => $request->status
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
        $anggota = Anggota::join('fakultas', 'anggota.id_fakultas', '=', 'fakultas.id')
            ->join('jurusan', 'anggota.id_jurusan', '=', 'jurusan.id')
            ->select('anggota.*', 'fakultas.fakultas', 'jurusan.jurusan')
            ->where('anggota.id', '=', $id)
            ->first();
        $fakultas = Fakultas::select('id', 'fakultas')->get();
        return view('admin.anggota.edit-anggota', compact('fakultas', 'anggota'));
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
                'fakultas' => 'required|string',
                'jurusan' => 'required|string',
                'angkatan' => 'required|string|min:4|max:4',
                'hp' => 'max:14',
                'alamat' => 'required|string',
                'status' => 'required|string'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Data Gagal Diupdate !!!');
        }
        $update = Anggota::find($id);
        $update->Update(
            [
                'nama' => $request->nama,
                'nim' => $request->nim,
                'id_fakultas' => $request->fakultas,
                'id_jurusan' => $request->jurusan,
                'angkatan' => $request->angkatan,
                'hp' => $request->hp,
                'jk' => $request->jk,
                'alamat' => $request->alamat,
                'status' => $request->status
            ]
        );

        return redirect(route('anggota'))->with('success', 'Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggota = Anggota::find($id);
        $pengurus = Pengurus::where('nim', $anggota->nim)->first();
        if (isset($pengurus)) {
            File::delete('assets/img/pengurus' . $pengurus->foto);
            $pengurus->delete();
        };
        $anggota->delete();
        return redirect()->back()->with('success', 'Data Berhasil dihapus');
    }
}
