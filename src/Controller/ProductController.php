<?php

namespace App\Controller;

use App\Entity\ProductEntity;
use App\Form\ProductFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


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
    public function store(Request $request)
    {   
        $product = new ProductEntity();
        $form = $this->createForm(ProductFormType::class , $product);

        $form->handleRequest($request);
            $productData = $form->getData();    

        

        return $this->render('product/createproduct.html.twig',[
            'form' => $form,
            'product'=> $productData,
        ]);
    }
}