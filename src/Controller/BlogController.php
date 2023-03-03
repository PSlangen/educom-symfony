<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Psr\Log\LoggerInterface;


#[Route('/blog')]
class BlogController extends BaseController
{

    #[Route('/show/{id}', name: 'blog_show')]
    public function show($id = 1) { 
       $this->log("info Message from extended BaseController", "warning");       
       dd($id);
    }

}