<?php

namespace App\Controller;

use App\Entity\SuperHero;
use App\Form\NouveauSuperHeroType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SuperHeroController extends AbstractController
{
    #[Route('/superhero', name: 'app_super_hero')]
    public function index(Request $request, EntityManagerInterface $EntityManager): Response
    {
        $SuperHero = new SuperHero();
        $formSuperHero = $this->createForm(NouveauSuperHeroType::class);
        $formSuperHero->handleRequest($request);
        if ($formSuperHero->isSubmitted()) {
            $produitRecupererDepuisLeFormulaire = $formSuperHero->getData();
            $EntityManager->persist($produitRecupererDepuisLeFormulaire);
            $EntityManager->flush();
        }
        return $this->render(
            'super_hero/index.html.twig',
            [
                "controller_name" => 'SuperHeroController',
                "formulaire" => $formSuperHero,
                "formulaireSuperHero" => $formSuperHero
            ]
        );
    }
}
