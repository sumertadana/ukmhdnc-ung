<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Slider;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::all();
        return view('admin.slider.slider', compact('slider'));
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
                'judul' => 'required|string|max:100',
                'gambar' => 'required|file|image|mimes:jpg|max:10000',
                // 'deskripsi' => 'required|string|max:100'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $filename = $request->judul . '.' . $request->gambar->extension();
        $lokasi = public_path('assets/img/slider');
        $request->file('gambar')->move($lokasi, $filename);

        $slider = new Slider;
        $slider->judul = $request->judul;
        $slider->gambar = $filename;
        $slider->save();

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
                'judul' => 'required|string|max:100',
                'gambar' => 'file|image|mimes:jpg|max:10000',
                // 'deskripsi' => 'required|string|max:100'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $slider = Slider::find($id);
        if ($request->hasFile('gambar')) {
            $filename = $request->judul . '.' . $request->gambar->extension();
            $lokasi = public_path('assets/img/slider');
            File::delete($lokasi . $slider->gambar);
            $request->file('gambar')->move($lokasi, $filename);
            $slider->gambar = $filename;
        }
        $slider->judul = $request->judul;
        $slider->save();

        return redirect(route('slider'))->with('success', 'Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Slider::find($id);
        File::delete('assets/img/pengurus' . $hapus->gambar);
        $hapus->delete();

        if ($hapus) {
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Data gagal dihapus');
        }
    }
}
