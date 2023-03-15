<?php

namespace App\Tests\ApplicationTest;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ApiTest extends WebTestCase
{
    public function testSuccesfulGet(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/products?category=1');

        $this->assertResponseIsSuccessful();
    }

    public function testUnsuccesfulGet(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/products');

        $this->assertNotEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }
}
