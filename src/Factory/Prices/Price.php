<?php

namespace AlxDorosenco\VatlayerForLaravel\Factory\Prices;

use AlxDorosenco\VatlayerForLaravel\Factory\AEndpoint;

class Price extends AEndpoint
{
    /**
     * @var int|float
     */
    private $amount;

    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var string
     */
    private $type;

    /**
     * @var int
     */
    private $incl;

    /**
     * @param int|float $amount
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setCountryCode(string $code)
    {
        $this->countryCode = $code;

        return $this;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param string $incl
     * @return $this
     */
    public function setIncl(string $incl)
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
