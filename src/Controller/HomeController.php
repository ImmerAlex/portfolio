<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    private $openDate;

    public function __construct()
    {
        $this->openDate = new \DateTime('2025-01-31T00:00:00+01:00');
    }

    #[Route('/', name: 'root')]
    public function index(): Response
    {
        if ($this->openDate > new \DateTime()) {
            return $this->render('home/under-constructi.html.twig');
        }

        return $this->redirectToRoute('home');
    }

    #[Route('/home', name: 'home')]
    public function home(): Response
    {
        if ($this->openDate > new \DateTime()) {
            return $this->redirectToRoute('root');
        }

        return $this->render('home/index.html.twig');
    }
}
