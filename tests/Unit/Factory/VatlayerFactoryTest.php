<?php

namespace AlxDorosenco\VatlayerForLaravel\Tests\Unit\Factory;

use AlxDorosenco\VatlayerForLaravel\Factory\VatlayerFactory;
use AlxDorosenco\VatlayerForLaravel\Tests\TestCase;

use AlxDorosenco\VatlayerForLaravel\Factory\Prices\Price;
use AlxDorosenco\VatlayerForLaravel\Factory\Rates\Rate;
use AlxDorosenco\VatlayerForLaravel\Factory\Rates\RateList;
use AlxDorosenco\VatlayerForLaravel\Factory\Types\Types;
use AlxDorosenco\VatlayerForLaravel\Factory\Validate\Validate;

class VatlayerFactoryTest extends TestCase
{
    public function testPriceMethod()
    {
        $this->assertEquals(new Price(), VatlayerFactory::price());
    }

    public function testRateMethod()
    {
        $this->assertEquals(new Rate(), VatlayerFactory::rate());
    }

    public function testRateListMethod()
    {
        $this->assertEquals(new RateList(), VatlayerFactory::rateList());
    }

    public function testTypesMethod()
    {
        $this->assertEquals(new Types(), VatlayerFactory::types());
    }

    public function testValidateMethod()
    {
        $this->assertEquals(new Validate(), VatlayerFactory::validate());
    }
}
