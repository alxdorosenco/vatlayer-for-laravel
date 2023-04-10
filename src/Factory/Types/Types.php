<?php

namespace AlxDorosenco\VatlayerForLaravel\Factory\Types;

use AlxDorosenco\VatlayerForLaravel\Factory\AEndpoint;

class Types extends AEndpoint
{
    /**
     * @var int
     */
    private $format;

    /**
     * @param int $format
     * @return $this
     */
    public function setFormat(int $format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        $data = [];

        !$this->format ?: $data['format'] = $this->format;

        return $data;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return 'types';
    }
}
