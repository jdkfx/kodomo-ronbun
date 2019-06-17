<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;

class ReportsController extends Controller
{
    public function index()
    {
        $reports = Report::all();

        return view('reports.index',[
            'reports' => $reports,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $report = Report::find($id);

        return view('reports.show',[
            'report' => $report,
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
