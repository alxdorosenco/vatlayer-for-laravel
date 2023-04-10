<?php

namespace AlxDorosenco\VatlayerForLaravel\Factory\Validate;

use AlxDorosenco\VatlayerForLaravel\Factory\AEndpoint;

class Validate extends AEndpoint
{
    /**
     * @var string
     */
    private $vatNumber;

    /**
     * @var int
     */
    private $format;

    /**
     * @var string
     */
    private $callback;

    /**
     * @param string $vatNumber
     * @return $this
     */
    public function setVatNumber(string $vatNumber)
    {
        $this->vatNumber = $vatNumber;

        return $this;
    }

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
     * @param string $callback
     * @return $this
     */
    public function setCallback(string $callback)
    {
        $this->callback = $callback;

        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        $data = [];

        !$this->vatNumber ?: $data['vat_number'] = $this->vatNumber;
        !$this->callback ?: $data['callback'] = $this->callback;
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
