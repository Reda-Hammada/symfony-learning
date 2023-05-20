<?php 

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController 
{    


    private $message = ['Hello','Hallo','Bonjour','Holla'];

    #[Route('/home',name: 'home')]
    public function index(): Response
    {
       return new Response(implode(' ', $this->message)); 
    }

    #[Route('/messages/{id}', name: 'message')]
    public function show(int $id): Response
    {   
       return new Response($this->message[$id]);

    }
}