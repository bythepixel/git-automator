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

        foreach($contents as $label) {
            $labels[] = new Label(
                $label->id,
                $label->url,
                $label->name,
                $label->color,
                $label->default
            );
        }
        
        return $labels;
    }

    /**
     * @param $array
     *
     * @return Label[]
     */
    static public function createFromArray( $array )
    {
        $labels = [ ];
        
        foreach($array as $label) {
            $labels[] = new Label(
                $label['id'],
                $label['url'],
                $label['name'],
                $label['color'],
                $label['default']
            );
        }
        
        return $labels;
    }
}
