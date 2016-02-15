<?php namespace App\Http\Controllers;

use App\Common\amtUtils;
use App\Http\Controllers\AmtController;
use Illuminate\Http\Request;
use DB;
use Input;

class TopController extends Controller {

    /**
     * 一覧初期表示
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /*
          データ抽出
        */
        
        $results = DB::select("select parent_title,count from m_parent_title where parent_title not ilike '%apple music%' order by count desc limit 20");
        $results2 = DB::select("select parent_title,count from m_parent_title where parent_title  ilike '%apple music%' order by count desc limit 20");
        $results_weekly = DB::select("select parent_title,count from m_parent_title_weekly where parent_title not ilike '%apple music%' order by count desc limit 10");
        $results_weekly2 = DB::select("select parent_title,count from m_parent_title_weekly where parent_title  ilike '%apple music%' order by count desc limit 10");
        // 初期表示フォーム
        $inputs = $array = array(
                          "word" => '',
                          "period" => ''
                        );
        if (amtUtils::isSmartPhone($_SERVER['HTTP_USER_AGENT']) || $request->has('sp')) {
          $blade = 'sp_top';
        } else {
          $blade = 'top';
          // 一時的PCトップはリダイレクト
          //return redirect('search?search=');
        }
        return view($blade ,['inputs' => $inputs,'results' => $results,'results2' => $results2,'results_weekly' => $results_weekly,'results_weekly2' => $results_weekly2]);
    }


}
