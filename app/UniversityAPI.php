<?php

namespace UniversityCollection;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpClient\HttpClient;

class UniversityAPI
{
    private const API_URL = "http://universities.hipolabs.com/search?country=";
    private HttpClientInterface $client;

    public function __construct()
    {
        $this->client = HttpClient::create();
    }

    public function getData(string $country): UniversityCollection
    {
        $response = $this->client->request("GET", self::API_URL . $country);

        $universityCollection = new UniversityCollection();

        foreach ($response->toArray() as $universityData)
        {
            if (isset($universityData['name'], $universityData['country'], $universityData['web_pages']))
            {
                $webPages = implode(", ", $universityData['web_pages']);

                $university = new University(
                    $universityData['name'],
                    $universityData['country'],
                    $webPages
                );

                $universityCollection->addUniversity($university);
            }
        }

        return $universityCollection;
    }
}