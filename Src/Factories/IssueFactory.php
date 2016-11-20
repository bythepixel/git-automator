<?php

namespace ByThePixel\Factories;

use ByThePixel\Entities\Issue;

class IssueFactory
{
    /**
     * @param $array
     *
     * @return Issue
     */
    static public function createFromArray( $array )
    {
        $user = UserFactory::createFromArray($array['user']);
        
        $labels = LabelFactory::createFromArray($array['labels']);
        
        $milestone = MilestoneFactory::createFromArray($array['milestone']);
        
        $issue = new Issue(
            $array['url'],
            $array['repository_url'],
            $array['labels_url'],
            $array['comments_url'],
            $array['events_url'],
            $array['html_url'],
            $array['id'],
            $array['number'],
            $array['title'],
            $user,
            $labels,
            $array['state'],
            $array['locked'],
            $array['assignee'],
            $array['assignees'],
            $milestone,
            $array['comments'],
            $array['created_at'],
            $array['updated_at'],
            $array['closed_at'],
            $array['body'],
            $array['closed_by']
        );

        return $issue;
        
    }
}
