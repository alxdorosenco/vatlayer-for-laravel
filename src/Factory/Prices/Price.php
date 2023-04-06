<?php

namespace AlxDorosenco\VatlayerForLaravel\Factory\Prices;

use AlxDorosenco\VatlayerForLaravel\Factory\AEndpoint;

class Price extends AEndpoint
{
    /**
     * @var int|float
     */
    private int|float $amount;

    /**
     * @var string
     */
    private string $countryCode;

    /**
     * @var string
     */
    private string $type;

    /**
     * @var int
     */
    private int $incl;

    /**
     * @param int|float $amount
     * @return $this
     */
    public function setAmount(int|float $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setCountryCode(string $code): static
    {
        $this->countryCode = $code;

        return $this;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param string $incl
     * @return $this
     */
    public function setIncl(string $incl): static
    {
        $this->incl = $incl;

        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        $data = [];

        !$this->amount ?: $data['amount'] = $this->amount;
        !$this->countryCode ?: $data['country_code'] = $this->countryCode;
        !$this->type ?: $data['type'] = $this->type;
        !$this->incl ?: $data['incl'] = $this->incl;

        return $data;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return 'price';
    }
}
