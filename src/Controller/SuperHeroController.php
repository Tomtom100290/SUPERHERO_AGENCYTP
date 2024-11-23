<?php

namespace App\Controller;

use App\Entity\SuperHero;
use App\Form\NouveauSuperHeroType;
use App\Repository\SuperHeroRepository;
use DateTime;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SuperHeroController extends AbstractController
{
    #[Route('/superhero', name: 'app_super_hero')]
    public function index(Request $request, EntityManagerInterface $EntityManager, SuperHeroRepository $repository): Response
    {
        $SuperHeros = $repository->findAll();
        $SuperHero = new SuperHero();
        $formSuperHero = $this->createForm(NouveauSuperHeroType::class, $SuperHero);
        $formSuperHero->handleRequest($request);
        if ($formSuperHero->isSubmitted() && $formSuperHero->isValid()) {
            $SuperHero = $formSuperHero->getData();
            /*$SuperHero->setCreatedAt(new DateTimeImmutable());*/
            /*$SuperHero->setUpdatedAt(new DateTimeImmutable());*/
            $EntityManager->persist($SuperHero);
            $EntityManager->flush();
        }
        /*$formSuperHero->remove(name: 'datedeCreation');*/
        return $this->render(
            'super_hero/index.html.twig',
            [
                "controller_name" => 'SuperHeroController',
                "formulaire" => $formSuperHero,
                "formulaireSuperHero" => $formSuperHero,
                "SuperHero" => $SuperHeros
            ]
        );
    }
}
