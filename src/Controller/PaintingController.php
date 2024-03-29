<?php

namespace App\Controller;

use App\Entity\Painting;
use App\Repository\CategoryRepository;
use App\Repository\PaintingRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class PaintingController extends AbstractController
{
    #[Route('/painting', name: 'paintings')]
    public function index(PaintingRepository $paintingRepository, CategoryRepository $categoryRepository): Response
    {
        $paintings = $paintingRepository->findBy(
            ['enable' => 'true'],
            ['number' => 'DESC']
        );

        $categories = $categoryRepository->findAll();

        return $this->render('painting/index.html.twig', [
            'paintings'     => $paintings,
            'categories'     => $categories,
        ]);
    }

    #[Route('/painting/next/{id}', name: 'next_painting_show')]
    public function nextPaintingShow(Painting $painting): Response
    {
        if (!$painting) {
            return $this->redirectToRoute('paintings');
        }
        return $this->render('painting/show.html.twig', [
            'painting' => $painting,
        ]);
    }


    #[Route('/painting/mode', name: 'price_mode')]
    public function modePriceDisplay(Request $request)
    {
        //session_start
        $session=$request->getSession();
        if (!$session->has('mode_price')) {
            $session->set('mode_price', false);
        }
        if ($session->get('mode_price')) {
            $session->set('mode_price', false);
        }else{
            $session->set('mode_price', true);
        }
        return $this->redirectToRoute('paintings');
    }

    #[Route('/painting/mode/{id}', name: 'price_mode_show_page')]
    public function modePriceDisplayShowPage(Request $request, Painting $painting)
    {
        //session_start
        $session=$request->getSession();
        if (!$session->has('mode_price')) {
            $session->set('mode_price', false);
        }
        if ($session->get('mode_price')) {
            $session->set('mode_price', false);
        }else{
            $session->set('mode_price', true);
        }

        //return show painting page
        if (!$painting) {
            return $this->redirectToRoute('paintings');
        }
        return $this->render('painting/show.html.twig', [
            'painting' => $painting,
        ]);
    }


    #[Route('/painting/{id}', name: 'painting_show')]
    public function showPainting(Painting $painting): Response
    {
        if (!$painting) {
            return $this->redirectToRoute('paintings');
        }
        return $this->render('painting/show.html.twig', [
            'painting' => $painting,
        ]);
    }
}
