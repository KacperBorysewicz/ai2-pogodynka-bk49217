<?php

namespace App\Controller;

use App\Repository\MeasurementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Location;
use App\Entity\Measurement;

class WeatherController extends AbstractController
{

    #[Route('/weather/{city}', name: 'app_weather', requirements: ["id" => "\d+"])]
    #[Route('/weather/{city}/{country}', name: 'app_weather_with_country', requirements: ["id" => "\d+"])]

    public function city(Location $location, MeasurementRepository $repository): Response
    {
        $measurement = $repository->findByLocation($location);
        return $this->render('weather/city.html.twig', [
            'location' => $location,
            'measurement' => $measurement,
        ]);
    }
}
