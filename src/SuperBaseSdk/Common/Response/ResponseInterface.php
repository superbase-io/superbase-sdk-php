<?php

namespace SuperBaseSdk\Common\Response;

interface ResponseInterface
{
    public function getStatusCode();
    public function getBody();
    public function getHeader($key);
}
