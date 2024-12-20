<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $openDate = new \DateTime('2025-01-31T00:00:00+01:00');
        $now = new \DateTime();
        $diff = $openDate->diff($now);

        if ($diff->invert) {
            return $this->render('home/under-constructi.html.twig');
        } else {
            return $this->render('home/index.html.twig');
        }
    }
}
