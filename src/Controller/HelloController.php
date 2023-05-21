<?php 

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloController extends AbstractController
{    
    private array $message = [
      [ 'message' => 'Hello', 'created'=> '2022/06/12'],
      ['message' =>  'Hallo', 'created'=> '2022/04/12'],
      ['message' =>  'Bonjour', 'created'=> '2022/05/12'],
    ];

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