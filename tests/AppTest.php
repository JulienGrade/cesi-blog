<?php

namespace App\Tests;

use Monolog\Test\TestCase;

class AppTest extends TestCase
{
    /**
     * Permet de tester que les tests fonctionnent
     * @return void
     */
    public function  testTestAreWorking()
    {
        $this->assertEquals(2, 1+1);
    }
}