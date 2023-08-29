<?php

namespace App\Controller;

use App\Repository\PaintingRepository;
use App\Repository\EventPhotoRepository;
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
}
