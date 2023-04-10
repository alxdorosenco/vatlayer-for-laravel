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
}
