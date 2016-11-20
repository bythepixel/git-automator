<?php

namespace ByThePixel\Factories;

use ByThePixel\Entities\Milestone;

class MilestoneFactory
{
    static public function createFromArray( $array )
    {
        $user = UserFactory::createFromArray($array['creator']);
        
        return new Milestone(
            $array['url'],
            $array['html_url'],
            $array['labels_url'],
            $array['id'],
            $array['number'],
            $array['title'],
            $array['description'],
            $user,
            $array['open_issues'],
            $array['closed_issues'],
            $array['state'],
            $array['created_at'],
            $array['updated_at'],
            $array['due_on'],
            $array['closed_at']
        );
    }
}
