<?php

namespace App\Controller;

use App\Entity\Event;
use App\Repository\EventRepository;
use App\Repository\EventPhotoRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EventController extends AbstractController
{
    #[Route('/event', name: 'events')]
    public function index(EventRepository $eventRepository): Response
    {
        $events = $eventRepository->findAll();

        return $this->render('event/index.html.twig', [
            'events'     => $events,            
        ]);
    }

    #[Route('/event/{id}', name: 'event_show')]
    public function showEvent(Event $event): Response
    {
        if (!$event) {
            return $this->redirectToRoute('events');
        }
        
        return $this->render('event/show.html.twig', [
            'event' => $event,
        ]);
    }

    #[Route('/photo', name: 'photos')]
    public function allPhotos(EventPhotoRepository $photoRepository): Response
    {
        $photos = $photoRepository->findAll();

        return $this->render('event/photos.html.twig', [
            'photos'     => $photos,            
        ]);
    }
}
