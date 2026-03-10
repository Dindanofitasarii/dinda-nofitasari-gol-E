<?php

namespace App\Http\Controllers;

use App\Models\Report;

class ReportController extends Controller
{
    public function index()
    {
        // Fitur 2: Mengambil data dengan Eloquent (beserta data user-nya)
        $reports = Report::with('user')->get();
        return view('admin.reports.index', compact('reports'));
    }
}