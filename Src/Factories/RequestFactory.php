<?php

namespace ByThePixel\Factories;

use ByThePixel\Entities\Request;
use Guzzle\Tests\Http\Server;
use Zend\Diactoros\ServerRequest;

class RequestFactory
{
    /**
     * @param ServerRequest $request
     *
     * @return Request
     */
    static public function createFromRequest( ServerRequest $request )
    {
        $payload = json_decode( $request->getParsedBody()['payload'], true );

        $user = UserFactory::createFromArray($payload['sender']);
        $organization = OrganizationFactory::createFromArray($payload['organization']);

        return new Request(
            $payload['action'],
            $organization,
            $user
        );
    }
}
