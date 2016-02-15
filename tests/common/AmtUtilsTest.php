<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Common\amtUtils;

class AmtUtilsTest extends TestCase
{

    /**
     * isSmartPhoneのテスト
     *
     * @see App\Common\amtUtils
     */
    public function testIsSmartPhone()
    {
        // iPhone
        $this->assertTrue(amtUtils::isSmartPhone("iPhone_dummy"));
        $this->assertTrue(amtUtils::isSmartPhone("dummy_iPhone"));
        $this->assertTrue(amtUtils::isSmartPhone("dummy_iPhone_dummy"));
        // Android
        $this->assertFalse(amtUtils::isSmartPhone("Android_dummy"));
        $this->assertFalse(amtUtils::isSmartPhone("dummy_Android"));
        $this->assertFalse(amtUtils::isSmartPhone("dummy_Android_dummy"));
        $this->assertFalse(amtUtils::isSmartPhone("Mobile_dummy"));
        $this->assertFalse(amtUtils::isSmartPhone("dummy_Mobile"));
        $this->assertFalse(amtUtils::isSmartPhone("dummy_Mobile_dummy"));

        $this->assertTrue(amtUtils::isSmartPhone("dummy_Mobile_Android_dummy"));
        $this->assertTrue(amtUtils::isSmartPhone("Mobile_dummy_Android"));
        $this->assertTrue(amtUtils::isSmartPhone("Android_dummy_Mobile"));

        // Windows Phone
        $this->assertTrue(amtUtils::isSmartPhone("Windows Phone_dummy"));
        $this->assertTrue(amtUtils::isSmartPhone("dummy_Windows Phone"));
        $this->assertTrue(amtUtils::isSmartPhone("dummy_Windows Phone_dummy"));


    }
}
