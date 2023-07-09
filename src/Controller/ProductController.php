<?php

namespace App\Controller;

use App\Entity\ProductEntity;
use App\Form\ProductFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }


    #[Route('/addproduct', name:'add_product')]
    public function store()
    {   
        $product = new ProductEntity();
        $form = $this->createForm(ProductFormType::class , $product);

        return $this->render('product/createproduct.html.twig',[
            'form' => $form
        ]);
    }
}