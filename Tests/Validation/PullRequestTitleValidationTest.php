<?php

use ByThePixel\Factories\PullRequestFactory;
use PSX\Json\Document;

class PullRequestTitleValidationTest extends \BaseTest
{
    protected $request;

    public function setUp(  )
    {
        $this->request = $this->getMockBuilder( \Zend\Diactoros\ServerRequest::class )
                              ->setMethods( ['getParsedBody'] )->getMock();
    }
    public function testTitleMutatesAndPassesValidation(  )
    {
        $document = Document::fromFile("../MockPostData/PullRequestOpenedPrefixedTitle.json");
        $data['payload'] = $document->toString();
        $this->request->method('getParsedBody')->willReturn( $data );

        $pullRequest = PullRequestFactory::create($this->request);

        $this->assertEquals('1704-improve-wishlist-search', $pullRequest->getTitle());
    }

    public function testTitleCannotMutateAndFailsValidation(  )
    {
        $this->setExpectedException(Exception::class, "Title could not be validated");
        $document        = Document::fromFile( "../MockPostData/PullRequestOpenedMalformedTitle.json" );
        $data['payload'] = $document->toString();
        $this->request->method( 'getParsedBody' )->willReturn( $data );

        $pullRequest = PullRequestFactory::create($this->request);
    }
}
