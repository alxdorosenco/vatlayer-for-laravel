<?php

namespace AlxDorosenco\VatlayerForLaravel\Factory\Types;

use AlxDorosenco\VatlayerForLaravel\Factory\AEndpoint;

class Types extends AEndpoint
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
        return 'types';
    }
}
