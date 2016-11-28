<?php

namespace ByThePixel\Controllers;

class RateLimitController extends BaseController
{
    public function show(  )
    {
        dump( $this->client->rateLimit()->getRateLimits());
        exit();
    }
}
