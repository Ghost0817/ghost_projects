<?php

namespace App\Repository;

use App\Entity\Exersice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * This custom Doctrine repository contains some methods which are useful when
 * querying for blog post information.
 *
 * See https://symfony.com/doc/current/doctrine/repository.html
 *
 */
class ExersiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Exersice::class);
    }

    /**
     * @return Exersice
     */
    public function findExersice()
    {
        return $this->createQueryBuilder('e')
            ->orderBy('RAND()', 'DESC')
            ->getQuery()->getSingleResult();
    }
    
}
