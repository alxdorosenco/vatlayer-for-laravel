<?php

namespace AlxDorosenco\VatlayerForLaravel\Http;

use AlxDorosenco\VatlayerForLaravel\Factory\AEndpoint;

class Response
{
    /**
     * @var Client
     */
    private Client $client;

    /**
     * @param AEndpoint $endPoint
     */
    public function __construct(
        private AEndpoint $endPoint
    ){
        $this->client = new Client($this->endPoint->getType(), $this->endPoint->getData());
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
}
