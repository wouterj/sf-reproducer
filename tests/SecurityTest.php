<?php

namespace App\Tests;

use App\Entity\User as AppUser;
use App\Security\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityTest extends WebTestCase
{
    public function testMemory(): void
    {
        $client = static::createClient();
        $client->request('POST', '/memory/login_check', [
            '_username' => 'wouter@example.com',
            '_password' => 'secure',
        ]);

        $crawler = $client->request('GET', '/memory/profile');

        $this->assertResponseIsSuccessful();
        $this->assertEquals('wouter@example.com', $client->getResponse()->getContent());
    }

    public function testDoctrine(): void
    {
        $client = static::createClient();
        $client->request('POST', '/doctrine/login_check', [
            '_username' => 'wouter@example.com',
            '_password' => 'secure',
        ]);

        $crawler = $client->request('GET', '/doctrine/profile');

        $this->assertResponseIsSuccessful();
        $this->assertEquals('wouter@example.com', $client->getResponse()->getContent());
    }
}
