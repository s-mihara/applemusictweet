<?php
namespace App\Common;
/**
 * 共通utils。amtはappleMusicTweetの略。
 * あんま増えない見込みなのでファイル一個にしておく。増えるようなら分割検討。
 * User: shun
 * Date: 2016/02/15
 */
class amtUtils
{

    /**
     * スマートフォン判定の時にtrue.
     * iPhone,Android,Windows Phoneを想定。
     * @param $ua
     * @return bool
     */
    public static function isSmartPhone($ua)
    {

        return ((strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false)
            || (strpos($ua, 'iPhone') !== false)
            || (strpos($ua, 'Windows Phone') !== false));

    }

}