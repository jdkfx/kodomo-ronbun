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
        $report = new Report;

        return view('reports.create',[
            'report' => $report,
        ]);
    }

    public function store(Request $request)
    {
        $report = new Report;
        $report->title = $request->title;
        $report->save();

        return redirect('/reports/'.$report->id);
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
        $report = Report::find($id);

        return view('reports.edit',[
            'report' => $report,
        ]);
    }

    public function update(Request $request, $id)
    {
        $report = Report::find($id);
        $report->title = $request->title;
        $report->save();

        return redirect('/reports/'.$report->id);
    }

    public function destroy($id)
    {
        $report = Report::find($id);
        $report->delete();

        return redirect('/');
    }
}
