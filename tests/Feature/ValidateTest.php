<?php

namespace AlxDorosenco\VatlayerForLaravel\Tests\Feature;

use AlxDorosenco\VatlayerForLaravel\Facades\Vatlayer;
use AlxDorosenco\VatlayerForLaravel\Tests\TestCase;

class ValidateTest extends TestCase
{
    public function testValidateVatNumber()
    {
        $this->assertIsArray(
            Vatlayer::validate()->setVatNumber('LU26375245')->toArray()
        );
    }

    public function testValidateCallback()
    {
        $this->assertIsString(
            Vatlayer::validate()
                ->setVatNumber('LU26375245')
                ->setCallback('CALLBACK_FUNCTION')
                ->setFormat(1)
                ->toJson()
        );
    }
}
