<?php

namespace AlxDorosenco\VatlayerForLaravel\Tests\Unit\Facades;

use AlxDorosenco\VatlayerForLaravel\Facades\Vatlayer;
use PHPUnit\Framework\TestCase;

class VatlayerTest extends TestCase
{
    /**
     * @var Vatlayer|__anonymous@354
     */
    private $vatLayer;

    public function __construct(string $name)
    {
        parent::__construct($name);

        $this->vatLayer = new class extends Vatlayer {
            public static function getFacadeAccessor()
            {
                return parent::getFacadeAccessor();
            }
        };
    }

    public function testGetFacadeAccessorMethod()
    {
        $this->assertIsString($this->vatLayer::getFacadeAccessor());
        $this->assertEquals('vatlayer-factory', $this->vatLayer::getFacadeAccessor());
    }
}
