<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiController extends AbstractController
{
    private  $client;
    #[Route('/api', name: 'api')]
    public function index(): Response
    {
        $this->apiCall();
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);

    }
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }
    public function apiCall(array $start, array $end){
        $response = $this->client->request(
            'GET',
            "https://api.tomtom.com/routing/1/calculateRoute/${start[0]},${start[1]}:${end[0]},${end[1]}/json?&key=93QPGYDZ5RHyBkovgCLGwwl5QKroBF9U"
        );
        $content = json_decode($response->getContent());

        return $content->routes[0]->legs[0]->summary->lengthInMeters;
    }
}
