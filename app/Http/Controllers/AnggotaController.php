<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use DataTables;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = Anggota::all();
        return view('admin.anggota', compact('anggota'));
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

        $tambah = Anggota::Create(
            [
                'nama' => $request->nama,
                'nim' => $request->nim,
                'angkatan' => $request->angkatan,
                'jk' => $request->jk,
                'fakultas' => $request->fakultas,
                'jurusan' => $request->jurusan,
                'alamat' => $request->alamat,
                'status' => $request->status
            ]
        );
        if ($tambah) {
            return redirect()->back()->with('success', 'Data Berhasil diTambahkan');
        } else {
            return redirect()->back()->with('error', 'Data Gagal diTambahkan');
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
        $update = Anggota::find($id);
        $update->update([

            'nama' => $request->nama,
            'nim' => $request->nim,
            'angkatan' => $request->angkatan,
            'jk' => $request->jk,
            'fakultas' => $request->fakultas,
            'jurusan' => $request->jurusan,
            'alamat' => $request->alamat,
            'status' => $request->status
        ]);
        if ($update) {
            return redirect()->back()->with('success', 'Data Berhasil diUpdate');
        } else {
            return redirect()->back()->with('error', 'Data Gagal diUpdate');
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
        Anggota::find($id)->delete();
        return redirect()->back()->with('success', 'Data Berhasil dihapus');
    }
}
