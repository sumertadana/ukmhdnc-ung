<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeri = Galeri::orderByDesc('id')->get();
        return view('admin.galeri.galeri', compact('galeri'));
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
        // dd($request);
        $validator = Validator::make(
            $request->all(),
            [
                'foto' => 'required|file|image|mimes:jpg|max:5000',
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $filename = $request->foto->getClientOriginalName();
        $lokasi = public_path('assets/img/galeri');
        $request->file('foto')->move($lokasi, $filename);

        $slider = new Galeri;
        $slider->foto = $filename;
        $slider->save();

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
        $galeri = Galeri::orderByDesc('created_at')->get();
        return view('users.galeri', compact('galeri'));
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
                'foto' => 'required|file|image|mimes:jpg|max:5000',
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $update = Galeri::find($id);
        $filename = $request->foto->getClientOriginalName();
        $lokasi = public_path('assets/img/galeri');
        $request->file('foto')->move($lokasi, $filename);

        $update->foto = $filename;
        $update->save();

        return redirect()->back()->with('success', 'Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Galeri::find($id);
        File::delete('assets/img/anggota' . $hapus->foto);
        $hapus->delete();

        return redirect()->back()->with('success', 'Data Berhasil dihapus');
    }
}
