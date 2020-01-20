<?php

namespace App\Controller\Student;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\UpgradedUsersType;
use App\Entity\UpgradedUsers;
use App\Entity\License;
use App\Repository\LicenseRepository;

/**
 * Controller used to manage blog contents in the public part of the site.
 *
 * @Route("/student")
 *
 * @author Sainzaya Batkhuu <sainzaya.b@gmail.com>
 */
class UpgradeController extends AbstractController
{
    /**
     * @Route("/upgrade", name="tutor_upgrade")
     */
    public function index(Request $request, LicenseRepository $licenseRep)
    {
        $entities = $licenseRep->findAll();
        return $this->render('student/upgrade/index.html.twig', [
            'entities' => $entities,
            "menu"     => 6
        ]);
    }
}