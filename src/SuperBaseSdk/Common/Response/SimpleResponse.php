<?php

namespace SuperBaseSdk\Common\Response;

class SimpleResponse implements ResponseInterface
{
    public function __construct($statuscode, $body)
    {
        $this->statuscode = $statuscode;
        $this->body = $body;
    }
    
    public function getStatusCode()
    {
        return $this->statuscode;
    }
    
    public function getBody()
    {
        return $this->body;
    }
}
