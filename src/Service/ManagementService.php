<?php

namespace App\Service;

use App\Entity\Post;
use App\Repository\PostRepository;


class ManagementService {

    /**
     * @var PostRepository
     */
    private $postRepository;

    public function __construct(PostRepository $postRepository) {
        $this->postRepository = $postRepository;
    }

    public function getPosts($type) {
        return $this->postRepository->findBy(['type' => 'run'], ['id' => 'desc']);
    }

    public function savePost(Post $post) {
        $this->postRepository->save($post);
    }

}