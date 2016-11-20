<?php

namespace ByThePixel\Factories;

use ByThePixel\Entities\Organization;

class OrganizationFactory
{
    static public function createFromArray( $array )
    {
        $organization = new Organization(
            $array['login'],
            $array['id'],
            $array['url'],
            $array['repos_url'],
            $array['events_url'],
            $array['hooks_url'],
            $array['issues_url'],
            $array['members_url'],
            $array['public_members_url'],
            $array['avatarUrl'],
            $array['description']
        );
        
        return $organization;
    }
}
