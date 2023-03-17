<?php

namespace AlxDorosenco\VatlayerForLaravel\Factory;

use AlxDorosenco\VatlayerForLaravel\Http\Response;

abstract class AEndpoint
{
    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return new Response($this);
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
