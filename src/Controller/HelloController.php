<?php 

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloController extends AbstractController
{    


    private $message = ['Hello','Hallo','Bonjour','Holla'];

    #[Route('/home',name: 'home')]
    public function index(): Response
    {
       return $this->render('Hello/home.html.twig',
       [
         'messages'=>$this->message
       ]
      );
    }


    #[Route('/messages/{id<\d+>?3}', name: 'message')]
    public function show(int $id): Response
    {    
      if($id > count($this->message)):
         
         return $this->render(
            'Hello/showmessage.html.twig',
           [
            'message' =>  implode(' ', $this->message ),
           ]

         );

      else:
         return $this->render(
            'Hello/showmessage.html.twig',
           [
            'message' => $this->message[$id] ,
           ]

           );
         
      endif;

    }
}