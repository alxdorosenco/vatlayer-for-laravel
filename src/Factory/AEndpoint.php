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
        return $this->client->setData($this->getData())->get();
    }

    /**
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this->client->setData($this->getData())->get());
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
