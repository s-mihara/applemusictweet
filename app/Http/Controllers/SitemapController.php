<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Input;

class SitemapController extends Controller {

    /**
     * 一覧初期表示
     *
     * @return Response
     */
    public function index()
    {
      $results = DB::select("select parent_title from m_parent_title order by count desc");

      return response()->view('sitemap' ,['results' => $results])->header('Content-Type', "application/xml");

    }


}
