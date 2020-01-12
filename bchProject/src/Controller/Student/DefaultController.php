<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller\Student;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\LangRepository;

/**
 * Controller used to manage blog contents in the public part of the site.
 *
 * @Route("/student")
 *
 * @author Sainzaya Batkhuu <sainzaya.b@gmail.com>
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/start", methods={"GET"}, name="student_index")
     */
    public function index(Request $request, LangRepository $langsRep): Response
    {
        if($this->getUser() && true === $this->isGranted('ROLE_STUDENT'))
        {
            $user = $this->getUser();
            $user->setLastActivityAt(new \DateTime('now'));
            $user->setLastAction('COURSE');
            $em->persist($user);
            $em->flush();
        }
        $langs = $langsRep->findAll();
        return $this->render('student/course/index.html.twig', [
            'entities' => $langs,
            "menu"     => 1
        ]);
    }
}
