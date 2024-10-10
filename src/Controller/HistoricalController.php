<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HistoricalController extends AbstractController
{
    /**
     * @Route("/history/{userId}", name="user_history")
     */
    public function getBorrowHistoryByUser($userId)
    {
        // Logique pour récupérer l'historique des emprunts d'un utilisateur
        return $this->json(['history' => []]);
    }
}
