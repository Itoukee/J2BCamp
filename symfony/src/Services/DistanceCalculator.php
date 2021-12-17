<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class DistanceCalculator
{
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getDistance(array $start, array $end): int
    {
        $pos =
        $response = $this->client->request(
            'GET',
            "https://api.tomtom.com/routing/1/calculateRoute/${start[0]},${start[1]}:${end[0]},${end[1]}/json?&key=" . $_ENV["TOMTOM_KEY"]
        );
        $content = json_decode($response->getContent());

        return ($content->routes[0]->legs[0]->summary->lengthInMeters) * 2;
    }
}