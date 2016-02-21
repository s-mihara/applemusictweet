<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Common\requestScopeUtils;

/**
 * Created by IntelliJ IDEA.
 * User: shun
 * Date: 2016/02/21
 * Time: 16:57
 */
class requestScopeUtilsTest extends TestCase
{
    const key = 'key';
    const val = 'val';

    /**
     * @see App\Common\requestScopeUtils::set
     */
    public function testSet()
    {
        $key = self::key;
        $val = self::val;
        requestScopeUtils::set($key, $val);
        $this->assertTrue(isset($_GET[requestScopeUtils::REQUEST_SCOPE][$key])
            && $_GET[requestScopeUtils::REQUEST_SCOPE][$key] === $val);
    }

    /**
     * @see App\Common\requestScopeUtils::get
     */
    public function testGet () {
        $key = self::key;
        $val = self::val;
        $_GET[requestScopeUtils::REQUEST_SCOPE][$key] = $val;
        $this->assertTrue(requestScopeUtils::get($key) === $val);
    }

    /**
     * @see App\Common\requestScopeUtils::requestCheckIsSmartPhone
     */
    public function testRequestCheckIsSmartPhone () {
        $key = self::key;
        $val = self::val;

        // no smartPhone
        $this->assertFalse(requestScopeUtils::requestCheckIsSmartPhone());
        // smartPhone
        $_GET[requestScopeUtils::REQUEST_SCOPE][requestScopeUtils::SMART_PHONE_KEY] = "t";
        $this->assertTrue(requestScopeUtils::requestCheckIsSmartPhone());
    }
}
