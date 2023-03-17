<?php

namespace AlxDorosenco\VatlayerForLaravel\Factory;

use AlxDorosenco\VatlayerForLaravel\Http\Client;

abstract class AEndpoint
{
    /**
     * @var Client
     */
    private Client $client;

    public function __construct()
    {
        $this->client = new Client($this->getType(), $this->getData());
    }

    /**
     * @return array
     * @throws \JsonException
     */
    public function toArray(): array
    {
        return json_decode($this->client->getContents(), true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @return string
     */
    public function toJson(): string
    {
        return $this->client->getContents();
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
