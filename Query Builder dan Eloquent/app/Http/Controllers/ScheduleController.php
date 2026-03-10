<?php

namespace App\Http\Controllers;
use App\Models\Schedule; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function index(Request $request)
{
    // Mengambil mode dari parameter URL (?mode=...)
    $mode = $request->query('mode', 'eloquent');

    if ($mode == 'query_builder') {
        // MENGGUNAKAN QUERY BUILDER
        $schedules = DB::table('schedules')
                     ->orderBy('start_time', 'asc')
                     ->get();
    } else {
        // MENGGUNAKAN ELOQUENT
        $schedules = Schedule::orderBy('start_time', 'asc')->get();
    }

    return view('manajemen_jadwal', compact('schedules', 'mode'));
}

    public function store(Request $request) {
        Schedule::create([
            'title' => $request->title,
            'start_time' => $request->start_time,
            'location' => $request->location,
            'status' => 'Mendatang'
        ]);
        return redirect('/schedules')->with('success', 'Agenda baru berhasil ditambahkan.');
    }

    public function update(Request $request, $id) {
        $schedule = Schedule::find($id);
        $schedule->update([
            'title' => $request->title,
            'start_time' => $request->start_time,
            'location' => $request->location,
            'status' => $request->status
        ]);
        return redirect('/schedules')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy($id) {
        Schedule::destroy($id);
        return redirect('/schedules')->with('success', 'Agenda berhasil dihapus.');
    }
}