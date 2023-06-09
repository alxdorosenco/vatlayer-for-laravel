<?php

namespace AlxDorosenco\VatlayerForLaravel\Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * @var string
     */
    protected $url = 'http://apilayer.net/api/';

    /**
     * @var string
     */
    protected $type = 'price';

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        config([
            'vatlayer.access_key' => 'b199976fdc2d3c7508049e19caff19e8'
        ]);
    }
}
