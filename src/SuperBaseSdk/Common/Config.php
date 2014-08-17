<?php

namespace SuperBaseSdk\Common;

use InvalidArgumentException;

class Config
{
    public function __construct($apikey, $apisecret, $backendcode, $datacentercode)
    {
        $this->apikey = $apikey;
        $this->apisecret = $apisecret;
        $this->datacentercode = $datacentercode;
        $this->backendcode = $backendcode;
        
        switch($datacentercode) {
            case 'dev':
                $this->setUrl('service.user', 'http://localhost:9999/api/' . $backendcode . '/user/v1/');
                break;
            default:
                throw new InvalidArgumentException("Unknown datacentercode: " . $datacentercode);
        }
    }
    
    public function getApiKey()
    {
        return $this->apikey;
    }
    
    public function getApiSecret()
    {
        return $this->apisecret;
    }
    
    public function setUrl($key, $value)
    {
        $this->url[$key] = $value;
    }
    
    public function getUrl($key)
    {
        if (!isset($this->url[$key])) {
            throw new InvalidArgumentException("Url not set: " . $key);
        }
        return $this->url[$key];
    }
}
