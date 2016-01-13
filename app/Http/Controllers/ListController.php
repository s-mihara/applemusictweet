<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Input;

class ListController extends Controller {

    /**
     * 一覧初期表示
     *
     * @return Response
     */
    public function index()
    {
        $results = DB::select("select parent_title,count from m_parent_title order by count desc limit 1000");

        // 初期表示フォーム
        $inputs = $array = array(
                          "word" => '',
                          "period" => ''
                        );
        return view('list' ,['inputs' => $inputs,'results' => $results]);
    }

    /**
     * 検索表示
     *
     * @return Response
     */
    public function search()
    {
        $word = Input::get('search');
        $period = Input::get('period');

        $wordLike = '%' . $word  . '%';
        $results = DB::select("select parent_title,count from m_parent_title where parent_title ilike ? order by count desc  limit 1000",[$wordLike]);

        $inputs = $array = array(
                          "word" => $word,
                          "period" => $period
                        );

        return view('list' ,['inputs' => $inputs,'results' => $results]);
    }

    /**
     * 詳細表示
     *
     * @return Response
     */
    public function detailModal()
    {
        $parentTitle = Input::get('parentTitle');
        $results = DB::select("select detail from m_parent_title where parent_title = ?",[$parentTitle])[0];
        if (!count($results) == 1) {
          echo 'error';
          return ;
        }
        $result = json_decode($results->detail,true);
        array_multisort($result,SORT_DESC ,array_column($result, 'tweet_date'));
        return view('detailModal' ,['results' => $result]);;
    }


}
