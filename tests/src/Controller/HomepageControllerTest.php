<?php

namespace App\Tests\src\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\Response;

class HomepageControllerTest extends WebTestCase
{
    /**
     * Permet de faire une requête sur /
     * @return Crawler
     */
    private function requestHomepage():Crawler
    {
        $client = static::createClient();
        return $client->request('GET', '/');
    }

    /**
     * Permet de vérifier que lorsque l'on tape / on obtient une réponse 200
     * @return void
     */
    public function testHomepage(): void
    {
        $this->requestHomepage();
        self::assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    /**
     * Permet de tester la présence du h1 pour le SEO
     * @return void
     */
    public function testMainTitleOnHomepage()
    {
        $this->requestHomepage();
        self::assertSelectorTextContains('h1', 'Bienvenu sur cesi-blog');
    }
}