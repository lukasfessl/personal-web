<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Post;

class HomepageController extends AbstractController {

    /**
     * @Route("/")
     */
    public function pageAction(EntityManagerInterface $entityManager) {

        $repository = $entityManager->getRepository(Post::class);
        $runList = $repository->findBy(['type' => 'run'], ['id' => 'desc']);

        return $this->render('personal_web.html.twig', [
                'runList' => $runList,
        ]);
    }

}

