<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class RestaurantsController extends AbstractController
{
#[Route("/restaurants",name:"ListeRestaurants")]
public function index(): Response
{
    return $this->render('restaurants/index.html.twig');
}
    #[Route('/restaurants/{slug}-{id}', name: 'ListeRestaurants.show',requirements: ['id' => '\d+',"slug"=>"[a-zA-Z0-9-]+"])]
    public function show(Request $request,string $slug,int $id): Response
    {
    #return $this->json([
     #   'slug' => $slug,
    #]);
       return new Response('Restaurant : ' .$slug);
        #return new Response("Ici ce trouve la page du". $request->query->get("name"));
    }
}
