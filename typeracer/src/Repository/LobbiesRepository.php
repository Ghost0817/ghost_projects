<?php

namespace App\Repository;

use App\Entity\Lobbies;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * This custom Doctrine repository contains some methods which are useful when
 * querying for blog post information.
 *
 * See https://symfony.com/doc/current/doctrine/repository.html
 *
 */
class LobbiesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lobbies::class);
    }

    public function findExistLobby($code) {
        return $this->createQueryBuilder('l')
            ->where('(l.createdAt +1) > :now')
            #->andWhere('l.user = :user')
            ->andWhere('l.code = :code')
            ->setParameter('now', new \DateTime())
            #->setParameter('user', $user)
            ->setParameter('code', $code)
            ->getQuery()->getResult();
    }
    
}
