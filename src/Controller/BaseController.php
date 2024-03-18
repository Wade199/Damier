<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\FormulaireJoueurType;

class BaseController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(): Response
    {
        return $this->render('base/index.html.twig', [
          
        ]);
    }
    #[Route('/private-Damier', name: 'Damier')]
    public function Damier(): Response
    {
        return $this->render('base/damier.html.twig', [
          'controller_name' => 'BaseController',
        ]);
    }
}



