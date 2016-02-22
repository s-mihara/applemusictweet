<?php
namespace App\Common;
/**
 * リクエストスコープとして、$_GETにリクエストスコープ用配列を用意。
 * 実際のフォーム値は入っていない。あくまでリクエスト間での値の受け渡しを想定して作成
 * User: shun
 * Date: 2016/02/15
 */
class requestScopeUtils
{

    const REQUEST_SCOPE = '__requestScope';
    const SMART_PHONE_KEY = 'is_sp';

    /**
     * リクエストスコープに値をセット。キーの検証無しで上書きする。
     * @param $key リクエストスコープのキー
     * @param $val リクエストスコープの値
     */
    public static function set($key, $val)
    {

        $_GET[self::REQUEST_SCOPE][$key] = $val;

    }

    /**
     * @param $key   リクエストスコープのキー
     * @return mixed リクエストスコープの値
     */

    public static function get($key)
    {

        return $_GET[self::REQUEST_SCOPE][$key];

    }

    /*
     *
     */
    public static function requestCheckIsSmartPhone()
    {
        return isset($_GET[self::REQUEST_SCOPE][self::SMART_PHONE_KEY]) &&
        $_GET[self::REQUEST_SCOPE][self::SMART_PHONE_KEY] === "t";
    }
}