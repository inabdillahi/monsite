<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(Request $request, EntityManagerInterface $manager): Response
    {
        $date = new DateTimeImmutable();
        $contact = new Contact;
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contact->setValidation(1);
            $manager->persist($contact);
            $manager->flush();
            $this->addFlash('success', "Vous avez bien envoyer, en vous repond bientot");
            return $this->redirectToRoute('home');
        }
        return $this->render('home/home.html.twig', [
            'datee' => $date,
            'titre' => "Millecode : Agence de développement web et Marketing digital",
            "form" => $form->createView()
        ]);
    }
}
