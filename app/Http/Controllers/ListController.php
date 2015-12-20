<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;

class ListController extends Controller {

    /**
     * 指定されたユーザーのプロファイルを表示する
     *
     * @return Response
     */
    public function index()
    {
        $results = DB::select("select parent_title,count from m_parent_title order by count desc");
        return view('list' ,['results' => $results]);
    }

}
