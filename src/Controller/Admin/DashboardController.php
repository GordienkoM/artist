<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use App\Entity\Category;
use App\Entity\Painting;
use App\Entity\EventPhoto;
use App\Entity\PaintingImage;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\PaintingCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
       
        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        $url=$adminUrlGenerator->setController(PaintingCrudController::class)->generateUrl();
        return $this->redirect($url);

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)

        // return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Администрация');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Панель управления', 'fa fa-home');
        yield MenuItem::linkToCrud('Картины', 'fa fa-picture-o', Painting::class);
        yield MenuItem::linkToCrud('Категории', 'fa fa-list-alt', Category::class);
        yield MenuItem::linkToCrud('Форографии картин', 'fas fa-camera-retro', PaintingImage::class);
        yield MenuItem::linkToCrud('События', 'fa fa-calendar', Event::class);
        yield MenuItem::linkToCrud('Форографии событий', 'fas fa-camera', EventPhoto::class);

    }
}
