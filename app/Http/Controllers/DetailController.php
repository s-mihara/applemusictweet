<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
      $parentTitle = str_replace(constant('SLA_ESCAPE'),'/',$parentTitle);
      $results = DB::select("select detail from m_parent_title where parent_title = ?",[$parentTitle]);
      if (!count($results) == 1) {
        echo 'error(not found)';
        return ;
      } else {
        $results = $results[0];
      }

      $result = json_decode($results->detail,true);
      // ツイート日の降順ソート
      array_multisort($result,SORT_DESC ,array_column($result, 'tweet_date'));

      $returns = array();
      $uniques = array();
      $uniqueKeys = 'title';
      /*
        同一タイトルの重複を省いて、カウントする。
        同一タイトルチェックは、とりあえずtitleにする。
        最終的には、ex_url_firest(リクエストは削除)が使われるのが好ましい。
      */
      foreach ($result as $key => $value) {
        if (!in_array($value[$uniqueKeys],$uniques)) {
          $value['cnt'] = 1;
          array_push($returns,$value);
          array_push($uniques,$value[$uniqueKeys]);
          // $url_firstのキー
          // $uniques[count($returns) - 1 ] = $values['url_first'];
        } else {
          $returns[array_search($value[$uniqueKeys],$uniques)]['cnt']++;
        }
      }


        if ($this->_isSmartPhone()) {
          $blade = 'sp_detail';
        } else {
          $blade = 'detail';
        }

        $inputs = $array = array(
                          "word" => '',
                          "period" => ''
                        );
        return view($blade ,['inputs' => $inputs,'results' => $returns,'parentTitle' => $parentTitle]);
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
        // decode
        $result = json_decode($results->detail,true);
        // ツイート日の降順ソート
        array_multisort($result,SORT_DESC ,array_column($result, 'tweet_date'));

        return view('detailModal' ,['results' => $result]);;
    }

    /**

    */

    private function _isSmartPhone () {
      $ua = $_SERVER['HTTP_USER_AGENT'];
      return  ((strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false)
      || (strpos($ua, 'iPhone') !== false)
      || (strpos($ua, 'Windows Phone') !== false)) ;

    }

}
