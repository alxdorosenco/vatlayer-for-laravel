<?php

namespace AlxDorosenco\VatlayerForLaravel\Tests\Unit\Factory;

use AlxDorosenco\VatlayerForLaravel\Factory\AEndpoint;
use Tests\TestCase;

class AEndpointTest extends TestCase
{
    public function testGetTypeAbstractMethod()
    {
        $stub = $this->getMockForAbstractClass(AEndpoint::class);
        $stub->expects($this->any())
            ->method('getType')
            ->will($this->returnValue('price'));

        $this->assertEquals('price', $stub->getType());
    }

    public function testGetDataAbstractMethod()
    {
        $stub = $this->getMockForAbstractClass(AEndpoint::class);
        $stub->expects($this->any())
            ->method('getData')
            ->will($this->returnValue([
                'amount' => 100,
                'country_code' => 'GB',
                'type' => 'medical',
                'incl' => 1
            ]));

        $this->assertEquals([
            'amount' => 100,
            'country_code' => 'GB',
            'type' => 'medical',
            'incl' => 1
        ], $stub->getData());
    }

    public function testToArrayMethod()
    {
        $stub = $this->getMockForAbstractClass(AEndpoint::class);
        $stub->expects($this->any())
            ->method('getType')
            ->will($this->returnValue('price'));

        $this->assertIsArray($stub->toArray());
    }

    public function testToJsonMethod()
    {
        $stub = $this->getMockForAbstractClass(AEndpoint::class);
        $stub->expects($this->any())
            ->method('getType')
            ->will($this->returnValue('price'));

        $this->assertIsString($stub->toJson());
    }
}
