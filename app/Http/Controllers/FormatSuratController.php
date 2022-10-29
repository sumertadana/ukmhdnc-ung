<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormatSurat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class FormatSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat = FormatSurat::all();
        return view('admin.formatsurat.formatsurat', compact('surat'));
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
                'nama_surat' => 'required|string|max:50',
                'file_surat' => 'required|file|max:10240|mimes:docx',
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $filename = $request->nama_surat . '.' . $request->file_surat->extension();
        $lokasi = public_path('assets/surat/format_surat');
        $request->file('file_surat')->move($lokasi, $filename);

        $tambah = new FormatSurat();
        $tambah->nama_surat = $request->nama_surat;
        $tambah->file_surat = $filename;
        $tambah->save();

        return redirect()->back()->with('success', 'Surat baru berhasil ditambahkan');
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
        $validator = Validator::make(
            $request->all(),
            [
                'nama_surat' => 'required|string|max:50',
                'file_surat' => 'file|max:10240|mimes:docx',
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $update = FormatSurat::find($id);
        if ($request->hasFile('file_surat')) {

            $path = public_path('assets/surat/format_surat/' . $update->file_surat);
            File::delete($path);

            $filename = $request->nama_surat . '.' . $request->file_surat->extension();
            $lokasi = public_path('assets/surat/format_surat');
            $request->file('file_surat')->move($lokasi, $filename);

            $update->file_surat = $filename;
        }
        $update->nama_surat = $request->nama_surat;
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
        $hapus = FormatSurat::find($id);
        $path = public_path('assets/surat/format_surat/' . $hapus->file_surat);
        File::delete($path);
        $hapus->delete();
        return redirect()->back()->with('success', 'Data Berhasil dihapus');
    }

    public function download($id)
    {
        $path = public_path('assets/surat/format_surat/' . $id);
        $filename = $id;
        $headers = array(
            'Content-Type: aplication/docx',
            'Content-Disposition' => 'inline; filename="' . $id . '"'
        );

        return Response::download($path, $filename, $headers);
    }
}
