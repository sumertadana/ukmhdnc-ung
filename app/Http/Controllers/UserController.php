<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $user = User::where('username', '!=', 'epik')->get();
        return view('auth.pengguna', compact('user'));
    }
    public function create()
    {
        return view('auth.tambah-pengguna');
    }
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:100',
                'username' => 'required|string|unique:users',
                'password' => 'required|string|max:20|min:4',
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect(route('users'))->with('success', 'Pengguna berhasil ditambahkan');
    }

    public function update($id, Request $request)
    {
        $update = User::find($id);
        if (isset($password)) {
            $update->password = Hash::make($request->password);
        }
        $update->name = $request->name;
        $update->username = $request->username;
        $update->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $hapus = User::find($id);
        $hapus->delete();

        return redirect()->back()->with('success', 'Pengguna Berhasil dihapus');
    }
}
