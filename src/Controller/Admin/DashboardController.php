<?php

namespace App\Controller\Admin;

use App\Entity\ContentBlock;
use App\Entity\ContentBlockType;
use App\Entity\Project;
use App\Entity\Technology;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Portfolio')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::linkToCrud('Users', 'fas fa-user', User::class);

        yield MenuItem::linkToCrud('Projects', 'fas fa-project-diagram', Project::class);

        yield MenuItem::linkToCrud('Content blocks', 'fas fa-file', ContentBlock::class);

        yield MenuItem::linkToCrud('Content block types', 'fas fa-file', ContentBlockType::class);

        yield MenuItem::linkToCrud('Technology', 'fas fa-cogs', Technology::class);
    }
}