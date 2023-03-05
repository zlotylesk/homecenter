<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Episode;
use App\Entity\Season;
use App\Entity\TvShow;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
            ->setTitle('Home Center')
            ->setFaviconPath('favicon.svg')
            ->renderContentMaximized()
            ->setLocales([
                'en' => '🇬🇧 English',
                'pl' => '🇵🇱 Polski'
            ]);
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::subMenu('Blog', 'fa fa-article')->setSubItems([
            MenuItem::linkToCrud('Tv Show', 'fas fa-list', TvShow::class),
            MenuItem::linkToCrud('Season', 'fas fa-list', Season::class),
            MenuItem::linkToCrud('Episode', 'fas fa-list', Episode::class),
        ]);
    }
}
