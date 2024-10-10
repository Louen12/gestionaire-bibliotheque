<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/login", name="user_login")
     */
    public function authenticate(Request $request)
    {
        // Logique d'authentification utilisateur (formulaire ou token)
        return $this->json(['status' => 'Authentifié']);
    }
}

