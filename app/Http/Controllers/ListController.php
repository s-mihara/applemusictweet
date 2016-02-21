<?php namespace App\Http\Controllers;

use App\Common\amtUtils;
use App\Common\requestScopeUtils;
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
        if (requestScopeUtils::requestCheckIsSmartPhone()) {
          $blade = 'sp_list';
        } else {
          $blade = 'list';
        }
        return view($blade ,['inputs' => $inputs,'results' => $results]);
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

        if (requestScopeUtils::requestCheckIsSmartPhone()) {
          $blade = 'sp_list';
        } else {
          $blade = 'list';
        }
        return view($blade ,['inputs' => $inputs,'results' => $results]);
    }

    /**
     * 全件検索
     *
     * @return Response
     */
    public function all() {
      $results = DB::select("select parent_title,count from m_parent_title  order by count desc  limit 1000");

      $inputs = $array = array(
                        "word" => "",
                        "period" => ""
                      );
      if (requestScopeUtils::requestCheckIsSmartPhone()) {
        $blade = 'sp_list';
      } else {
        $blade = 'list';
      }
      return view($blade ,['inputs' => $inputs,'results' => $results]);
    }

    /**
     * プレイリスト検索
     *
     * @return Response
     */
    public function playlist() {
      $results = DB::select("select parent_title,count from m_parent_title where parent_title ilike 'apple music%'  order by count desc  limit 1000");

      $inputs = $array = array(
                        "word" => "apple music",
                        "period" => ""
                      );
      if (requestScopeUtils::requestCheckIsSmartPhone()) {
        $blade = 'sp_list';
      } else {
        $blade = 'list';
      }
      return view($blade ,['inputs' => $inputs,'results' => $results]);
    }
    /**
     * 全件検索
     *
     * @return Response
     */
    public function random() {
      $results = DB::select("select parent_title,count from m_parent_title  order by RANDOM()  limit 50");

      $inputs = $array = array(
                        "word" => "",
                        "period" => "",
                        "is_random" =>"true"
                      );
      if (requestScopeUtils::requestCheckIsSmartPhone()) {
        $blade = 'sp_list';
      } else {
        $blade = 'list';
      }
      return view($blade ,['inputs' => $inputs,'results' => $results]);
    }

}
