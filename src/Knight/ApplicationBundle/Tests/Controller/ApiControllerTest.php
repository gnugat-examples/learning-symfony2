<?php
// File: src/Knight/ApplicationBundle/Tests/Controller/ApiControllerTest.php

namespace Knight\ApplicationBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ApiControllerTest extends WebTestCase
{
    private function post($uri, array $data)
    {
        $content = json_encode($data);
        $client = static::createClient();
        $client->request('POST', $uri, array(), array(), array(), $content);

        return $client->getResponse();
    }

    public function testOfferingTheRightThing()
    {
        $response = $this->post('/api/ni', array('offering' => 'shrubbery'));

        $this->assertSame(Response::HTTP_OK , $response->getStatusCode());
    }

    public function testOfferingTheWrongThing()
    {
        $response = $this->post('/api/ni', array('offering' => 'hareng'));

        $this->assertSame(Response::HTTP_UNPROCESSABLE_ENTITY , $response->getStatusCode());
    }
}
