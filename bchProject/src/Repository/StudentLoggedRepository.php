<?php
/**
 * Created by PhpStorm.
 * User: Sainzaya.B
 * Date: 1/25/2019
 * Time: 10:00 AM
 */

namespace App\Repository;

use App\Entity\StudentLogged;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class StudentLoggedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudentLogged::class);
    }
}