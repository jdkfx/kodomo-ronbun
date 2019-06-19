<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\ReportText;

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
        $report_text = new ReportText;

        return view('reports.create',[
            'report' => $report,
            'report_text' => $report_text,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'contents_text' => 'required',
        ]);

        $report = new Report;
        $report->title = $request->title;
        $report->report_text()->report_id = $report->id;
        $report->report_text()->contents_text = $request->contents_text;
        $report->save();

        return redirect('/reports/'.$report->id);
    }

    public function show($id)
    {
        $report = Report::find($id);
        $report_text = ReportText::where('id',$report->id)->first();

        return view('reports.show',[
            'report' => $report,
            'report_text' => $report_text,
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
