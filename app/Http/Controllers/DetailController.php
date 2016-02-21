<?php namespace App\Http\Controllers;

use App\Common\amtUtils;
use App\Common\requestScopeUtils;
use DB;
use Input;

define('SLA_ESCAPE', '   sla_escape   ');

class DetailController extends Controller {

    /**
     * 一覧初期表示
     *
     * @return Response
     */
    public function index($parentTitle)
    {
      /*
        パラメータから詳細データを取得
      */
      $parentTitle = str_replace(constant('SLA_ESCAPE'),'/',$parentTitle);
      $results = DB::select("select detail from m_parent_title where parent_title = ?",[$parentTitle]);
      if (!count($results) == 1) {
        echo 'error(not found)';
        return ;
      } else {
        $results = $results[0];
      }

      $result = json_decode($results->detail,true);



      /*
        同一タイトルの重複を省いて、カウントする。
        同一タイトルチェックは、とりあえずtitleにする。
        最終的には、ex_url_firest(リクエストは削除)が使われるのが好ましい。
      */
      // 初期化
      $returns = array();
      $uniques = array();
      $uniqueKeys = 'title';

      // 最新のデータを使いたいので、一旦idで降順ソートさせる
      array_multisort(array_column($result, 'id'),SORT_DESC,SORT_NUMERIC ,$result);

      foreach ($result as $key => $value) {
        if (!in_array($value[$uniqueKeys],$uniques)) {
          $value['cnt'] = 1;
          array_push($returns,$value);
          array_push($uniques,$value[$uniqueKeys]);
          // $url_firstのキー
          // $uniques[count($returns) - 1 ] = $values['url_first'];
        } else {
          // カウンタを増やす
          $returns[array_search($value[$uniqueKeys],$uniques)]['cnt']++;
        }
      }

      /*
        表示用ソート
      */
      $sortKey = Input::get('sort') == 'date' ? 'tweet_date':'cnt';
      array_multisort(array_column($returns, $sortKey),SORT_DESC ,$returns);

      /*
        スマホ判定
      */
        if (requestScopeUtils::requestCheckIsSmartPhone()) {
          $blade = 'sp_detail';
        } else {
          $blade = 'detail';
        }

        /*
          検索引数の初期化
        */
        $inputs = $array = array(
                          "word" => '',
                          "period" => '',
                          "sort" => Input::get('sort')
                        );

        /*
          return
        */
        return view($blade ,['inputs' => $inputs,'results' => $returns,'parentTitle' => $parentTitle]);
    }

    /**
     * 詳細表示(モーダル表示用、現在未呼び出し、一応残しとく)
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
        // decode
        $result = json_decode($results->detail,true);
        // ツイート日の降順ソート
        array_multisort($result,SORT_DESC ,array_column($result, 'tweet_date'));

        return view('detailModal' ,['results' => $result]);;
    }

}
