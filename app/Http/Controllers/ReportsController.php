<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\ReportText;
use App\ReportAbstract;

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
        $report_abstract = new ReportAbstract;

        return view('reports.create',[
            'report' => $report,
            'report_text' => $report_text,
            'report_abstract' => $report_abstract,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'contents_text' => 'required',
            'contents_abstract' => 'required',
        ]);

        $report = new Report;
        $report_text = new ReportText;
        $report_abstract = new ReportAbstract;

        $report->title = $request->title;
        $report->save();

        $report->report_text()->create([
            'contents_text' => $request->contents_text,
        ]);

        $report->report_abstract()->create([
            'contents_abstract' => $request->contents_abstract,
        ]);

        return redirect('/reports/'.$report->id);
    }

    public function show($id)
    {
        $report = Report::find($id);
        $report_text = ReportText::where('report_id',$report->id)->first();
        $report_abstract = ReportAbstract::where('report_id',$report->id)->first();

        return view('reports.show',[
            'report' => $report,
            'report_text' => $report_text,
            'report_abstract' => $report_abstract,
        ]);
    }

    public function edit($id)
    {
        $report = Report::find($id);
        $report_text = ReportText::where('report_id',$report->id)->first();
        $report_abstract = ReportAbstract::where('report_id',$report->id)->first();

        return view('reports.edit',[
            'report' => $report,
            'report_text' => $report_text,
            'report_abstract' => $report_abstract,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'contents_text' => 'required',
            'contents_abstract' => 'required',
        ]);

        $report = Report::find($id);
        $report_text = ReportText::where('report_id',$report->id)->first();
        $report_abstract = ReportAbstract::where('report_id',$report->id)->first();

        $report->title = $request->title;
        $report->save();

        $report_text->contents_text = $request->contents_text;
        $report_text->save();

        $report_abstract->contents_abstract = $request->contents_abstract;
        $report_abstract->save();

        return redirect('/reports/'.$report->id);
    }

    public function destroy($id)
    {
        $report = Report::find($id);
        $report_text = ReportText::where('report_id',$report->id)->first();
        $report_abstract = ReportAbstract::where('report_id',$report->id)->first();

        $report->delete();

        return redirect('/');
    }
}
