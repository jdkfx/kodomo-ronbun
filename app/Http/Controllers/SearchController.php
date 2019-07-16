<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\ReportDetail;

class SearchController extends Controller
{
    public function searchKeyword(Request $request)
    {
        $keyword = $request->input('keyword');

        $query = Report::query();

        if(!empty($keyword)){
            $query->where('title','like','%'.$keyword.'%');
        }else{
            return redirect('/');
        }

        $reports = $query->orderBy('created_at','desc')->paginate(20);
        return view('search.index',[
            'reports' => $reports,
            'keyword' => $keyword,
        ]);
    }

    public function searchCategory($category_id)
    {
        $reports = array();
        $report_details = ReportDetail::where('category_id',$category_id)->get();
        foreach($report_details as $report_detail){
            $reports[] = $report_detail->report;
        }

        switch($category_id){
            case 1:
                $category = '植物（しょくぶつ）';
                break;
            case 2:
                $category = '昆虫（こんちゅう）';
                break;
            case 3:
                $category = '動物（どうぶつ）';
                break;
            case 4:
                $category = '物質（ぶっしつ）';
                break;
            case 5:
                $category = '宇宙（うちゅう）';
                break;
            case 6:
                $category = '音（おと）';
                break;
            case 7:
                $category = '重力（じゅうりょく）';
                break;
            case 8:
                $category = '天気（てんき）';
                break;
            case 9:
                $category = '磁石（じしゃく）';
                break;
            case 10:
                $category = '電気（でんき）';
                break;
            case 11:
                $category = '大地（だいち）';
                break;
            case 0:
                $category = 'その他（そのほか）';
                break;
        }

        if(!($category_id >= 0 && $category_id <= 11)){
            abort(404,'お探しのページは削除されたか、現在アクセスできない状態になっている可能性があります。<br>もしくは、アクセスしているリンクが間違っていないかお確かめください。');
        }

        return view('search.index',[
            'reports' => $reports,
            'category' => $category,
        ]);
    }
}
