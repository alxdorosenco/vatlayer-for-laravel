<?php

namespace AlxDorosenco\VatlayerForLaravel\Tests\Feature;

use AlxDorosenco\VatlayerForLaravel\Facades\Vatlayer;
use AlxDorosenco\VatlayerForLaravel\Tests\TestCase;

class RateListTest extends TestCase
{
    public function testFormat()
    {
        $this->assertIsString(
            Vatlayer::rateList()->setFormat(1)->toJson()
        );
    }
}
