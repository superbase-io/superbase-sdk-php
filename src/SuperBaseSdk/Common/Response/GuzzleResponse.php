<?php

namespace SuperBaseSdk\Common\Response;

class GuzzleResponse implements ResponseInterface
{
    public function __construct($guzzleresponse)
    {
        $this->guzzleresponse = $guzzleresponse;
    }
    
    public function getStatusCode()
    {
        return $this->guzzleresponse->getStatusCode();
    }
    
    public function getBody()
    {
        return $this->guzzleresponse->getBody();
    }
        
    public function getHeader($key)
    {
        return $this->guzzleresponse->getHeader($key);
    }
}
