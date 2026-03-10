<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Outlet;

class OutletController extends Controller
{
    // 1. FUNGSI TAMPIL DATA (READ)
    public function index(Request $request)
    {
        $mode = $request->query('mode', 'eloquent');

        if ($mode == 'query_builder') {
            $outlets = DB::table('outlets')->get();
        } else {
            $outlets = Outlet::all();
        }

        return view('manajemen_outlet', compact('outlets', 'mode'));
    }

    // 2. FUNGSI TAMBAH DATA (CREATE)
    public function store(Request $request)
    {
        $mode = $request->query('mode', 'eloquent');
        
        // Validasi agar tidak duplikat dan muncul pesan error yang rapi
        $request->validate([
            'code' => 'required|unique:outlets,code',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        if ($mode == 'query_builder') {
            // QUERY BUILDER
            DB::table('outlets')->insert([
                'code' => $request->code,
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'status' => 'Aktif', // Default status
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            // ELOQUENT ORM
            // Kita gabungkan data input dengan status default 'Aktif'
            Outlet::create(array_merge($request->all(), ['status' => 'Aktif']));
        }

        return redirect('/outlets?mode='.$mode)->with('success', 'Data berhasil disimpan via ' . str_replace('_', ' ', $mode));
    }

    // 3. FUNGSI EDIT DATA (UPDATE)
    public function update(Request $request, $id)
    {
        $mode = $request->query('mode', 'eloquent');

        if ($mode == 'query_builder') {
            // QUERY BUILDER
            DB::table('outlets')->where('id', $id)->update([
                'code' => $request->code,
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'status' => $request->status,
                'updated_at' => now(),
            ]);
        } else {
            // ELOQUENT ORM
            $outlet = Outlet::findOrFail($id);
            $outlet->update($request->all());
        }

        return redirect('/outlets?mode='.$mode)->with('success', 'Outlet diperbarui via ' . str_replace('_', ' ', $mode));
    }

    // 4. FUNGSI HAPUS DATA (DELETE)
    public function destroy(Request $request, $id)
    {
        $mode = $request->query('mode', 'eloquent');

        if ($mode == 'query_builder') {
            DB::table('outlets')->where('id', $id)->delete();
        } else {
            $outlet = Outlet::findOrFail($id);
            $outlet->delete();
        }

        return redirect('/outlets?mode='.$mode)->with('success', 'Outlet dihapus menggunakan teknik ' . str_replace('_', ' ', $mode));
    }
}