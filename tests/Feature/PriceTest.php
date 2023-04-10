<?php

namespace AlxDorosenco\VatlayerForLaravel\Tests\Feature;

use AlxDorosenco\VatlayerForLaravel\Facades\Vatlayer;
use AlxDorosenco\VatlayerForLaravel\Tests\TestCase;

class PriceTest extends TestCase
{
    public function testAmount()
    {
        $this->assertIsString(
            Vatlayer::price()
                ->setAmount(100)
                ->setCountryCode('GB')
                ->setType('medical')
                ->setFormat(1)
                ->toJson()
        );
    }
}
