<?php

namespace AlxDorosenco\VatlayerForLaravel\Http;

class Client
{
    /**
     * @var string
     */
    private string $url = 'http://apilayer.net/api/';

    /**
     * @var string
     */
    private string $protocol = 'http';

    /**
     * @param string $type
     * @param array $data
     */
    public function __construct(
        private string $type,
        private array $data
    ){
        $this->url .= $this->type;
        $this->data['access_key'] = config('vatlayer.access_key');
    }

    /**
     * @return string
     * @throws \JsonException
     */
    public function getContents(): string
    {
        $postdata = http_build_query($this->data);

        $opts = [
            $this->protocol => [
                'method' => 'POST',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            ]
        ];

        $context = stream_context_create($opts);

        $contents = file_get_contents($this->url, false, $context);

        if(!$contents){
            throw new \RuntimeException('Cannot access '.$this->url.' to read contents.');
        }

        $contentsArray = json_decode($contents, true, 512, JSON_THROW_ON_ERROR);

        if(!empty($contentsArray['error']['type'])){
            $error = new Error($contentsArray['error']['message'], $contentsArray['error']['code']);
            $error->throwExceptionByType($contentsArray['error']['type']);
        }

        return $contents;
    }
}
