<?php

namespace App\Tests\ApplicationTest;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/products?category=1');

        $this->assertResponseIsSuccessful();
    }
}
