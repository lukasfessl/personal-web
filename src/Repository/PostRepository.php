<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Entity\Post;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 */
class PostRepository extends ServiceEntityRepository {

    public function __construct(RegistryInterface $registry) {
        parent::__construct($registry, Post::class);
    }

    public function save($entity) {
        if ($entity->getId()) {
            $this->getEntityManager()->merge($entity);
        } else {
            $this->getEntityManager()->persist($entity);
        }
        $this->getEntityManager()->flush();
    }

    public function delete($entity) {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }
}