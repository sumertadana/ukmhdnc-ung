<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris;
use Illuminate\Support\Facades\Validator;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventaris = Inventaris::all();
        return view('admin.inventaris.inventaris', compact('inventaris'));
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
                'nama' => 'required|string|max:100',
                'jumlah' => 'required|string|min:1|max:5',
                'kondisi' => 'required|string'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Data Gagal Diupdate !!!');
        }

        $tambah = Inventaris::Create(
            [
                'nama' => $request->nama,
                'jumlah' => $request->jumlah,
                'kondisi' => $request->kondisi,
            ]
        );
        if ($tambah) {
            return redirect()->back()->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Data gagal ditambahkan');
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
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required|string|max:100',
                'jumlah' => 'required|string|min:1|max:5',
                'kondisi' => 'required|string'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Data Gagal Diupdate !!!');
        }
        $update = Inventaris::find($id);
        $update->update([

            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'kondisi' => $request->kondisi,
        ]);
        if ($update) {
            return redirect()->back()->with('success', 'Data berhasil diupdate');
        } else {
            return redirect()->back()->with('error', 'Data gagal diupdate');
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
        Inventaris::find($id)->delete();
        return redirect()->back()->with('success', 'Data Berhasil dihapus');
    }
}
