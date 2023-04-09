<?php

namespace AlxDorosenco\VatlayerForLaravel\Factory;

use AlxDorosenco\VatlayerForLaravel\Http\Client;

abstract class AEndpoint
{
    /**
     * @var Client
     */
    private $client;

    public function __construct()
    {
        $this->client = new Client($this->getType());
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return json_decode($this->client->get(), true);
    }

    /**
     * @return string
     */
    public function toJson(): string
    {
        return $this->client->get();
    }

    /**
     * @return string
     */
    abstract public function getType(): string;

    /**
     * @return array
     */
    abstract public function getData(): array;
}
