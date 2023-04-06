<?php

namespace AlxDorosenco\VatlayerForLaravel\Factory\Rates;

use AlxDorosenco\VatlayerForLaravel\Factory\AEndpoint;

class Rate extends AEndpoint
{
    /**
     * @var string
     */
    private string $countryCode;

    /**
     * @var string
     */
    private string $ipAddress;

    /**
     * @var int
     */
    private int $clientIp;

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
     * @param string $ipAddress
     * @return $this
     */
    public function setIpAddress(string $ipAddress): static
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * @param int $clientIp
     * @return $this
     */
    public function setClientIp(int $clientIp): static
    {
        $this->clientIp = $clientIp;

        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        $data = [];

        !$this->countryCode ?: $data['country_code'] = $this->countryCode;
        !$this->ipAddress ?: $data['ip_address'] = $this->ipAddress;
        !$this->ipAddress ?: $data['client_ip'] = $this->clientIp;

        return $data;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return 'rate';
    }
}
