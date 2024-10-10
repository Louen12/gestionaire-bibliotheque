<?php

namespace App\Controller;

use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    /**
     * @Route("/books", name="books_list")
     */
    public function getAllBooks()
    {
        // Logique pour récupérer tous les livres
        return $this->json(['books' => []]);
    }

    /**
     * @Route("/book/{bookId}", name="book_detail")
     */
    public function getBookById($bookId)
    {
        // Logique pour récupérer un livre par ID
        return $this->json(['book' => []]);
    }

    /**
     * @Route("/search", name="search_books")
     */
    public function searchBooks(Request $request)
    {
        $query = $request->get('query');
        // Logique pour rechercher des livres
        return $this->json(['books' => []]);
    }
}

