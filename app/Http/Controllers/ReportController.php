<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function create()
    {
        $areas = Area::all();
        return view('report.create', compact('areas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'area_id' => 'required|exists:areas,id',
            'description' => 'required|string',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $photoPath = $request->file('photo')->store('reports', 'public');

        Report::create([
            'user_id' => Auth::id(),
            'area_id' => $request->area_id,
            'description' => $request->description,
            'photo_path' => $photoPath,
            'status' => 'pending',
            'latitude' => '-6.200000',
            'longitude' => '106.816666',
        ]);

        return redirect()->route('dashboard')->with('status', 'Laporan berhasil dikirim!');
    }
}