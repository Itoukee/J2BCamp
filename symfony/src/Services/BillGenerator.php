<?php

namespace App\Service;

use App\Entity\Bills;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class BillGenerator
{
    public function __construct(private HttpClientInterface $client, private DistanceCalculator $distanceCalculator)
    {
    }

    /**
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function generatePdf(Bills $bill)
    {
        $comedian = $bill->getComedian();
        $training = $bill->getTraining();
        $company = $bill->getCompany();
        $distance = $this->distanceCalculator->getDistance($comedian->getPos(), $company->getPos())/1000;
        $resp = $this->client->request(
            'GET',
            'http://node:4242/bill',
            [
                "json" => [
                    "bill_status" => [
                        "paid" => $bill->getPaid()
                    ],
                    "bill_ids" => [
                        "bill_id" => $bill->getId(),
                        "case_number" => $bill->getCaseNumber(),
                        "traineeship_number" => $bill->getNumStage(),
                        "bdc_number" => $bill->getBdc()

                    ],
                    "comedian_infos" => [
                        "name" => $comedian->getfirstName() . " " . $bill->getComedian()->getlastName(),
                        "address" => $comedian->getStreetNumber() . ", " . $comedian->getRoute(),
                        "city" => $comedian->getLocality(),
                        "email" => $comedian->getEmail(),
                        "phone" => $comedian->getPhoneNumber(),

                    ],
                    "training_infos" => [
                        "training_date" => $bill->getInterDate()->format("Y-m-d"),
                        "price" => $training->getPrice(),
                        "days" => $training->getDuration(),
                        "km" => $distance,
                        "tva" => 20

                    ],

                    "client_infos" => [
                        "business_name" => $company->getName(),
                        "address" => $company->getStreetNumber() . ", " . $company->getRoute(),
                        "city" => $company->getLocality(),

                    ],
                    "agency_infos" => [
                        "tva_intra" => "FR17481413847 "
                    ]
                ]
            ]
        );
        $pdf = $resp->getContent();
        header("Content-Type: application/pdf");
        echo $pdf;

    }


}