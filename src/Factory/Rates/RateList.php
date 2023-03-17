<?php

namespace AlxDorosenco\VatlayerForLaravel\Factory\Rates;

use AlxDorosenco\VatlayerForLaravel\Factory\AEndpoint;

class RateList extends AEndpoint
{
    /**
     * @return array
     */
    public function getData(): array
    {
        return [];
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return 'rate_list';
    }
}
