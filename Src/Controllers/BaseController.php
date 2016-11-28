<?php

namespace ByThePixel\Controllers;

use Github\Client;

class BaseController
{

    protected $client;

    /**
     * BaseController constructor.
     */
    public function __construct( )
    {
        $this->client = new Client();
        $this->client->authenticate( getenv( "githubToken" ), null, Client::AUTH_HTTP_TOKEN );
    }
}
