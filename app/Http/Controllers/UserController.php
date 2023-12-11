<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest('id')->get();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users,username',
            'status' => 'required|in:aktif,non-aktif'
        ], [
            'nama.required' => 'Nama Tidak Boleh kosong.',
            'username.required' => 'Username Tidak Boleh kosong.',
            'username.unique' => 'Username Sudah Terdaftar.',
            'status.required' => 'Silahkan pilih status.',
            'status.in' => 'Status tidak valid.'
        ]);
        User::create([
            'nama' => $request->post('nama'),
            'username' => $request->post('username'),
            'status' => $request->post('status'),
            'password' => Hash::make('12345')
        ]);
        return redirect()->route('user.list')->with('success', 'User berhasil ditambhkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'status' => 'required|in:aktif,non-aktif'
        ], [
            'nama.required' => 'Nama Tidak Boleh kosong.',
            'username.required' => 'Username Tidak Boleh kosong.',
            'status.required' => 'Silahkan pilih status.',
            'status.in' => 'Status tidak valid.'
        ]);
        $user = User::findOrFail($id);
        $user->update([
            'nama' => $request->post('nama'),
            'username' => $request->post('username'),
            'status' => $request->post('status')
        ]);
        return redirect()->route('user.list')->with('success', 'User berhasil diupdate.');
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.list')->with('success', 'User berhasil dihapus.');
    }

    public function changePassword()
    {
        return view('change-password');
    }

    public function updatePassword(Request $request)
    {
        $data = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed|min:6',
        ], [
            'oldpassword.required' => 'Password lama tidak boleh kosong.',
            'password.required' => 'Password baru tidak boleh kosong.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
            'password.min' => 'Password baru minimal 6 huruf.',
        ]);
        $user = User::where('id', Auth::user()->id)->first();
        if (Hash::check($data['oldpassword'], $user->password)) {
            if (strcmp($data['oldpassword'], $data['password']) != 0) {
                User::where('id', Auth::user()->id)->update(['password' => Hash::make($data['password'])]);
                Auth::logout();
                return redirect()->route('login')->with('success', 'Password anda berhasil diupdate. Silahkan login kembali.');
            } else {
                return back()->with('error', 'Password Baru tidak boleh sama dengan password lama.');
            }
        } else {
            return back()->with('error', 'Password Lama Salah.');
        }
    }
}
