<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request) {
    // Ambil mode dari URL, default-nya adalah 'eloquent'
    $mode = $request->query('mode', 'eloquent');

    if ($mode == 'query_builder') {
        // Menggunakan Query Builder
        $users = DB::table('users')->get();
    } else {
        // Menggunakan Eloquent
        $users = \App\Models\User::all();
    }

    return view('manajemen_user', compact('users', 'mode'));
}

    public function store(Request $request) {
    DB::table('users')->insert([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'status' => 'Aktif',
        'password' => bcrypt('password123'),
        'created_at' => now(),
        'updated_at' => now()
    ]);
    return redirect('/users')->with('success', 'User baru berhasil ditambahkan ke sistem.');
}

public function update(Request $request, $id) {
    DB::table('users')->where('id', $id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'updated_at' => now()
    ]);
    return redirect('/users')->with('success', 'Data user berhasil diperbarui.');
}

public function destroy($id) {
    DB::table('users')->where('id', $id)->delete();
    return redirect('/users')->with('success', 'User telah dihapus dari database.');
}
}