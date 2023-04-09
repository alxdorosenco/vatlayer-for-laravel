<?php

namespace AlxDorosenco\VatlayerForLaravel\Factory\Validate;

use AlxDorosenco\VatlayerForLaravel\Factory\AEndpoint;

class Validate extends AEndpoint
{
    /**
     * @var string
     */
    private string $vatNumber;

    /**
     * @var int
     */
    private int $format;

    /**
     * @param string $vatNumber
     * @return $this
     */
    public function setVatNumber(string $vatNumber)
    {
        $this->vatNumber = $vatNumber;

        return $this;
    }

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

        !$this->vatNumber ?: $data['vat_number'] = $this->vatNumber;
        !$this->format ?: $data['format'] = $this->format;

        return $data;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return 'validate';
    }
}
