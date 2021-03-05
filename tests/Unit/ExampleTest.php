<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    //نام فایل ها باید به صورت nameTest.php ذخیره شوند
    //نام کلاس ها باید به صورت nameTest.php ذخیره شوند
    //نام فانکشن ها باید به صورت ()testFuncName ذخیره شوند
//    php artisan test //to run tests
//    php artisan make:test UserTest //to create test
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
//        assert means:انتظار میرود
//        assertTrue(x) means:انتظار میرود درست باشد x
//        $this->assertTrue(true); //test pass
//        $this->assertTrue(false); //test fail
        $this->assertTrue(true);
    }

    public function test_math_grater_number()
    {
        $a=5<10;
        $this->assertTrue($a);
    }
}
