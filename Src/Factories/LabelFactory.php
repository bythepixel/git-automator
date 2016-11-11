<?php

namespace ByThePixel\Factories;

use ByThePixel\Entities\Label;
use Psr\Http\Message\ResponseInterface;

// @todo abstract class for factories to extend
class LabelFactory
{
    // @todo possibly different static create methods for difference types
    /**
     * @param ResponseInterface $response
     *
     * @return Label[]
     */
    static public function create( ResponseInterface $response )
    {
        $labels = [ ];

        $contents = json_decode($response->getBody()->getContents());

        foreach($contents as $content) {
            $label = new Label(
                $content->id,
                $content->url,
                $content->name,
                $content->color,
                $content->default
            );

            $labels[] = $label;
        }
        
        return $labels;
    }
}
