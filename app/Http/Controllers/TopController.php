<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Input;

class TopController extends Controller {

    /**
     * 一覧初期表示
     *
     * @return Response
     */
    public function index()
    {
      // deployテスト用コメント
        $results = DB::select("select parent_title,count from m_parent_title where parent_title not ilike '%apple music%' order by count desc limit 20");
        $results2 = DB::select("select parent_title,count from m_parent_title where parent_title  ilike '%apple music%' order by count desc limit 20");

        // 初期表示フォーム
        $inputs = $array = array(
                          "word" => '',
                          "period" => ''
                        );
        if ($this->_isSmartPhone()) {
          $blade = 'sp_top';
        } else {
          $blade = 'top';
          // 一時的PCトップはリダイレクト
          //return redirect('search?search=');
        }
        return view($blade ,['inputs' => $inputs,'results' => $results,'results2' => $results2]);
    }

    private function _isSmartPhone () {
      $ua = $_SERVER['HTTP_USER_AGENT'];
      return  ((strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false)
      || (strpos($ua, 'iPhone') !== false)
      || (strpos($ua, 'Windows Phone') !== false)) ;

    }

}
