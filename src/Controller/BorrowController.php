<?php

namespace App\Controller;

use App\Entity\Borrow;
use App\Entity\Book;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BorrowController extends AbstractController
{
    /**
     * @Route("/borrow/{bookId}/{userId}", name="borrow_book")
     */
    public function borrowBook($userId, $bookId)
    {
        // Logique pour vérifier si le livre est disponible et créer un emprunt
        // Ajout d'une nouvelle entrée dans la table Borrow
        return $this->json(['status' => 'Livre emprunté']);
    }

    /**
     * @Route("/return/{bookId}/{userId}", name="return_book")
     */
    public function returnBook($userId, $bookId)
    {
        // Logique pour marquer le livre comme retourné et mettre à jour le statut
        return $this->json(['status' => 'Livre retourné']);
    }
}
