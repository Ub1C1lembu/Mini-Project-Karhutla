<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class ReportController extends Controller
{
    public function create()
    {
        $areas = Area::all();

        return view('report.create', compact('areas'));
    }

    public function store(Request $request)
    {

    }
}