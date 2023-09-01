<?php

namespace App\Controller;

use App\Repository\PaintingRepository;
use App\Repository\EventPhotoRepository;
use App\Repository\TextInsertRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(PaintingRepository $paintingRepository, EventPhotoRepository $photoRepository): Response
    {
        $paintings = $paintingRepository->findBy(
            ['enable' => 'true'],
            ['name' => 'ASC']
        );
        $photos = $photoRepository->findAll();

        return $this->render('main/index.html.twig', [
            'paintings'     => $paintings,
            'photos'     => $photos,
        ]);
    }

    #[Route('/change_locale/{locale}', name: 'change_locale')]
    public function changeLocale($locale, Request $request)
    {
        // On stocke la langue dans la session
        $request->getSession()->set('_locale', $locale);

        // On revient sur la page précédente
        return $this->redirect($request->headers->get('referer'));
    }

    #[Route('/artist', name: 'about_artist')]
    public function artist(TextInsertRepository $textInsertRepository): Response
    {
        $artistText=$textInsertRepository->findBy(
            ['name' => 'about_artist']
        );
        return $this->render('main/artist.html.twig', [
            'artistText'     => $artistText,
        ]);
    }

}


