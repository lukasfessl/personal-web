<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Post;
use App\Service\ManagementService;
use App\FormType\PostType;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/admin")
 */
class AdminController extends AbstractController {

    /**
     * @Route("/")
     */
    public function runAction(ManagementService $managementService) {
        $posts = $managementService->getPosts('run');
        return $this->render('admin/run/list.html.twig', [
            'posts' => $posts
        ]);
    }

    /**
     * @Route("/edit-run/{id}")
     */
    public function editRunAction(Post $post, ManagementService $managementService, Request $request) {
        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $managementService->savePost($post);
            return $this->redirectToRoute('app_admin_run');
        }

        return $this->render('admin/run/form.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/about")
     */
    public function aboutAction(ManagementService $managementService) {
        $posts = $managementService->getPosts('default');
        return $this->render('admin/about/list.html.twig', [
                'posts' => $posts
        ]);
    }

}

