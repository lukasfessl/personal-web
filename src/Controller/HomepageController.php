<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController {


    /**
     * @Route("/")
     */
    public function pageAction() {

        return $this->render('personal_web.html.twig', [

        ]);
    }

}

