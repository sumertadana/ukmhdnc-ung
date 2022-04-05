<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Berita;
use App\Models\Bidang;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::join('bidang', 'berita.id_bidang', '=', 'bidang.id')
            ->select('berita.*', 'bidang.bidang')
            ->orderByDesc('berita.created_at')
            ->get();
        return view('admin/berita/berita', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bidang = Bidang::select('id', 'bidang')->where('bidang', '!=', 'Pengurus Inti')->get();
        return view('admin.berita.tambah-berita', compact('bidang'));
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
        $filename = $request->judul . '.' . $request->gambar->extension();
        $lokasi = public_path('assets/img/berita');
        $request->file('gambar')->move($lokasi, $filename);

        $tambah = Berita::Create(
            [
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'gambar' => $filename,
                'id_bidang' => $request->id_bidang,
                'view' => 0,
                'penulis' => $request->penulis
            ]
        );
        if ($tambah) {
            return redirect(route('berita'))->with('success', 'Data Berhasil ditambahkan');
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
        // $berita = Berita::where('judul', $id)->first();
        $berita = Berita::join('bidang', 'berita.id_bidang', '=', 'bidang.id')
            ->select('berita.*', 'bidang.bidang')
            ->where('berita.judul', '=', $id)
            ->first();
        $view = $berita->view + 1;
        $berita->view = $view;
        $berita->save();
        return view('users.berita', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $edit = Berita::findorfail($id);
        $edit = Berita::join('bidang', 'berita.id_bidang', '=', 'bidang.id')
            ->select('berita.*', 'bidang.bidang')
            ->where('berita.id', '=', $id)
            ->first();
        $bidang = Bidang::select('id', 'bidang')->where('bidang', '!=', 'Pengurus Inti')->get();
        return view('admin.berita.edit-berita', compact('edit', 'bidang'));
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
        $update = Berita::find($id);
        if ($request->hasFile('gambar')) {
            $lokasi = public_path('assets/img/berita/');
            $filename = $request->judul . '.' . $request->gambar->extension();
            File::delete($lokasi . $update->gambar);
            $request->file('gambar')->move($lokasi, $filename);

            $update->update(
                [
                    'judul' => $request->judul,
                    'deskripsi' => $request->deskripsi,
                    'id_bidang' => $request->id_bidang,
                    'gambar' => $filename,
                    'penulis' => $request->penulis
                ]
            );
        } else {
            $update->update(
                [
                    'judul' => $request->judul,
                    'deskripsi' => $request->deskripsi,
                    'id_bidang' => $request->id_bidang,
                    'penulis' => $request->penulis
                ]
            );
        }

        if ($update) {
            return redirect(route('berita'))->with('success', 'Berita Berhasil diupdate');
        } else {
            return redirect()->back()->with('error', 'Berita Gagal diupdate');
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
        $delete = Berita::find($id);
        $lokasi = public_path('assets/img/berita/' . $delete->gambar);
        File::delete($lokasi);
        $delete->delete();

        return redirect()->back()->with('success', 'Berita Berhasil dihapus');
    }

    public function galeri()
    {
        $galeri = Berita::all();
        return view('users.galeri', compact('galeri'));
    }
}
