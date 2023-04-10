<?php

namespace AlxDorosenco\VatlayerForLaravel\Tests\Feature;

use AlxDorosenco\VatlayerForLaravel\Facades\Vatlayer;
use AlxDorosenco\VatlayerForLaravel\Tests\TestCase;

class TypesTest extends TestCase
{
    public function testFormat()
    {
        $this->assertIsString(
            Vatlayer::types()->setFormat(1)->toJson()
        );
    }
}
