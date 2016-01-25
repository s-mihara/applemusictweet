<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Input;

class DetailController extends Controller {

    /**
     * 一覧初期表示
     *
     * @return Response
     */
    public function index($parentTitle)
    {

      $results = DB::select("select detail from m_parent_title where parent_title = ?",[$parentTitle]);
      if (!count($results) == 1) {
        echo 'error';
        return ;
      } else {
        $results = $results[0];
      }

      $result = json_decode($results->detail,true);
      array_multisort($result,SORT_DESC ,array_column($result, 'tweet_date'));
      //return view('detailModal' ,['results' => $result]);

        if ($this->_isSmartPhone()) {
          $blade = 'sp_detail';
        } else {
          // 開発するまではPCもスマホで
          //$blade = 'detail';
          $blade = 'sp_detail';
        }
        //print_r($result);
        return view($blade ,['results' => $result,'parentTitle' => $parentTitle]);
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

    /**

    */

    private function _isSmartPhone () {
      $ua = $_SERVER['HTTP_USER_AGENT'];
      return  ((strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false)
      || (strpos($ua, 'iPhone') !== false)
      || (strpos($ua, 'Windows Phone') !== false)) ;

    }

}
