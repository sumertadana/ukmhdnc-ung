<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Models\Berita;
use App\Models\Bidang;
use App\Models\Komentar;
use App\Models\Komentar2;

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

        $validator = Validator::make(
            $request->all(),
            [
                'judul' => 'required|string|max:100',
                'deskripsi' => 'required|string|min:50',
                'gambar' => 'required|file|image|mimes:jpg|max:2048',
                'id_bidang' => 'required|string',
                'penulis' => 'required|string|max:50'
            ]
        );
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Data Gagal Ditambahkan !!!');
        }

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
            return redirect()->back()->with('error', 'Data Gagal ditambahkan !!!');
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
        $validator = Validator::make(
            $request->all(),
            [
                'judul' => 'required|string|max:100',
                'deskripsi' => 'required|string|min:50',
                'gambar' => 'file|image|mimes:jpg|max:2048',
                'id_bidang' => 'required|string',
                'penulis' => 'required|string|max:50'
            ]
        );
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Data Gagal Ditambahkan !!!');
        }

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
        $komentar1 = Komentar::where('id_berita', $id)->delete();
        $komentar2 = Komentar2::where('id_berita', $id)->delete();
        $lokasi = public_path('assets/img/berita/' . $delete->gambar);
        File::delete($lokasi);
        // $komentar1->delete();
        // $komentar2->delete();
        $delete->delete();

        return redirect()->back()->with('success', 'Berita Berhasil dihapus');
    }

    public function cariartikel(Request $request)
    {
        $cari = $request->cari;
        $berita = Berita::join('bidang', 'berita.id_bidang', '=', 'bidang.id')
            ->select('berita.*', 'bidang.bidang')
            ->where('berita.judul', 'like', '%' . $cari . '%')
            // ->orderByDesc('berita.created_at')
            ->paginate(4);
        $j = count($berita);
        // dd($j);
        if (count($berita) > 0) {
            $x = 1;
            return view('users.index', compact('berita', 'cari', 'x'));
        } else {
            $x = 2;
            return view('users.index', compact('cari', 'x'));
        };
    }

    public function kirimkomentar(Request $request)
    {
        $berita = Berita::find($request->id_berita);
        $jumlahkomentar = $berita->komentar + 1;
        $berita->komentar = $jumlahkomentar;
        $berita->save();

        $komentar = new Komentar;
        $komentar->id_berita = $request->id_berita;
        $komentar->nama = $request->nama;
        $komentar->komentar = $request->komentar;
        $komentar->save();
        return redirect()->back();
    }

    public function balaskomentar(Request $request)
    {
        $berita = Berita::find($request->id_berita);
        $jumlahkomentar = $berita->komentar + 1;
        $berita->komentar = $jumlahkomentar;
        $berita->save();

        $balas = new Komentar2;
        $balas->id_komentar = $request->id_komentar;
        $balas->id_berita = $request->id_berita;
        $balas->nama = $request->nama;
        $balas->komentar = $request->komentar;
        $balas->save();

        return redirect()->back();
    }
}
