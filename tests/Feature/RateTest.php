<?php

namespace AlxDorosenco\VatlayerForLaravel\Tests\Feature;

use AlxDorosenco\VatlayerForLaravel\Facades\Vatlayer;
use AlxDorosenco\VatlayerForLaravel\Tests\TestCase;

class RateTest extends TestCase
{
    public function testCountryCode()
    {
        $this->assertIsArray(
            Vatlayer::rate()->setCountryCode('GB')->toArray()
        );
    }

    public function testIpAddress()
    {
        $this->assertIsArray(
            Vatlayer::rate()->setIpAddress('176.249.153.36')->toArray()
        );
    }

    public function testClientIp()
    {
        $this->assertIsArray(
            Vatlayer::rate()
                ->setIpAddress('176.249.153.36')
                ->setClientIp(1)
                ->setFormat(1)
                ->toArray()
        );
    }
}
