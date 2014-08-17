<?php

namespace SuperBaseSdk\Common;

use SuperBaseSdk\Common\Response\GuzzleResponse;

abstract class BaseClient
{
    protected function init($service, $config)
    {
        $this->config = $config;
        $this->service = $service;
        
        $guzzleconfig = array(
            'base_url' => $this->config->getUrl('service.' . $this->service),
            'defaults' => [
                'auth' => [$config->getApiKey(), $config->getApiSecret()]
            ]
        );
        $this->guzzleclient = new \GuzzleHttp\Client($guzzleconfig);
    }
    
    public function get($url, array $options = array())
    {
        $res = $this->guzzleclient->get($url, $options);
        
        $response = new GuzzleResponse($res);
        return $response;
    }
}
