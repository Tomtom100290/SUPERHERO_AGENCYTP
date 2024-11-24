<?php

namespace App\Controller;

use App\Entity\SuperHero;
use App\Form\NouveauSuperHeroType;
use App\Form\SuperheroeditType;
use App\Repository\SuperHeroRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NewsuperheroController extends AbstractController
{
    #[Route('/newsuperhero', name: 'app_newsuperhero')]
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
        return $this->render(
            'newsuperhero/index.html.twig',
            [
                'controller_name' => 'NewsuperheroController',
                "formulaireSuperHero" => $formSuperHero,
            ]
        );
    }
    /*#[Route("/superhero/{id}/edit", name: "superhero.edit")]
    public function edit(SuperHero $SuperHeros)
    {
        $formedit = $this->createForm(SuperheroeditType::class, $SuperHeros);
        return $this->render("superhero/edit.html.twig", [
            'editsuperhero' => $SuperHeros,
            'formedit' => $formedit


        ]);
    }*/
}
