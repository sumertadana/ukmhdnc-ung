<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat = SuratMasuk::all();
        return view('admin.suratmasuk.surat-masuk', compact('surat'));
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
        $validator = Validator::make(
            $request->all(),
            [
                'no_surat' => 'required|string|max:15',
                'perihal' => 'required|string|max:100',
                'instansi' => 'required|string|max:50',
                'tgl_surat' => 'required',
                'file_surat' => 'required|file|max:1024|mimes:jpg',
                'periode' => 'required|string|max:9|min:9'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Data Gagal ditambahkan');
        }

        $filename = $request->instansi . '-' . $request->tgl_surat . '.' . $request->file_surat->extension();
        $lokasi = public_path('assets/surat/surat_masuk');
        $request->file('file_surat')->move($lokasi, $filename);

        $tambah = new SuratMasuk;
        $tambah->no_surat = $request->no_surat;
        $tambah->perihal = $request->perihal;
        $tambah->instansi = $request->instansi;
        $tambah->tgl_surat = $request->tgl_surat;
        $tambah->file_surat = $filename;
        $tambah->periode = $request->periode;
        $tambah->save();

        return redirect()->back()->with('success', 'Surat Masuk berhasil ditambahkan');
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

        // dd($request);
        $validator = Validator::make(
            $request->all(),
            [
                'no_surat' => 'required|string|max:15',
                'perihal' => 'required|string|max:100',
                'instansi' => 'required|string|max:50',
                'tgl_surat' => 'required',
                'file_surat' => 'file|max:1024|mimes:jpg',
                'periode' => 'required|string|max:9|min:9'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Data Gagal diupdate');
        }
        $update = SuratMasuk::find($id);
        if ($request->hasFile('file_surat')) {

            $path = public_path('assets/surat/surat_masuk' . $update->file_surat);
            File::delete($path);

            $filename = $request->perihal . '-' . $request->tgl_surat . '.' . $request->file_surat->extension();
            $lokasi = public_path('assets/surat/surat_masuk');
            $request->file('file_surat')->move($lokasi, $filename);

            $update->file_surat = $filename;
        }
        $update->no_surat = $request->no_surat;
        $update->perihal = $request->perihal;
        $update->instansi = $request->instansi;
        $update->tgl_surat = $request->tgl_surat;
        $update->periode = $request->periode;
        $update->save();

        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $hapus = SuratMasuk::find($id);
        $path = public_path('assets/surat/surat_masuk' . $hapus->file_surat);
        File::delete($path);
        $hapus->delete();
        return redirect()->back()->with('success', 'Data Berhasil dihapus');
    }

    public function download($id)
    {

        $path = public_path('assets/surat/surat_masuk/' . $id);
        $filename = $id;
        $headers = array(
            'Content-Type: image/jpg',
            'Content-Disposition' => 'inline; filename="' . $id . '"'
        );
        return Response::download($path, $filename, $headers);
    }
}
