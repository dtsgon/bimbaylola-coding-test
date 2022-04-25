<?php

namespace App\Controller\Admin;

use App\Entity\Movies;
use App\Entity\People;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

#[Route('/dashboard')]
class MovieController extends AbstractDashboardController
{
    #[Route('/movies', name: 'movies')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(MoviesCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Bimbaylola');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Inicio', 'fa fa-home');

        yield MenuItem::section('Películas');
        yield MenuItem::linkToCrud('Listado', 'fa fa-list', Movies::class)->setAction('index');

        yield MenuItem::section('Actores/Directores');
        yield MenuItem::linkToCrud('Listado', 'fa fa-list', People::class)->setAction('index');
        yield MenuItem::linkToCrud('Crear', 'fa fa-pencil', People::class)->setAction('new');

    }
}
