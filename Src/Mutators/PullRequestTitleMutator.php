<?php

namespace ByThePixel\Mutators;

use League\Route\Http\Exception;

class PullRequestTitleMutator
{
    /**
     * @param string $title
     *
     * @return string
     */
    public static function run($title) {
        preg_match( "/\d+-.+/", $title, $matches );
        
        // No matches, or multiple matches found, just return the title
        if(sizeof($matches) !== 1) {
            return $title;
        }
        
        return array_shift($matches);
    }
}
