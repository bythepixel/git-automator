<?php

namespace ByThePixel\Factories;

use ByThePixel\Entities\User;

class UserFactory
{
    /**
     * @param $array
     *
     * @return User
     */
    static public function createFromArray( $array )
    {
        $user = new User(
            $array['login'],
            $array['id'],
            $array['avatar_url'],
            $array['gravatar_id'],
            $array['url'],
            $array['html_url'],
            $array['followers_url'],
            $array['following_url'],
            $array['gists_url'],
            $array['starred_url'],
            $array['subscriptions_url'],
            $array['organizations_url'],
            $array['repos_url'],
            $array['events_url'],
            $array['received_events_url'],
            $array['type'],
            $array['site_admin']
        );
        
        return $user;
    }
}
