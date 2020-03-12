<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller\Entertaiment;

use App\Repository\PostRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Controller used to manage blog contents in the public part of the site.
 *
 * @Route("/")
 *
 * @author Sainzaya Batkhuu <sainzaya.b@gmail.com>
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/", methods={"GET"}, name="home_index")
     */
    public function index(Request $request, PostRepository $posts): Response
    {
        $recentPosts = $posts->findRecent();

        return $this->render('entertaiment/home/index.html.twig', [
            'menu' => 'home',
            'posts' => $recentPosts,
        ]);
    }
    /**
     * @Route("/teacher-portal", methods={"GET"}, name="teacher_index")
     */
    public function teacherportal(Request $request): Response
    {
        return $this->render('entertaiment/home/teacherportal.html.twig', [
            'menu' => 'teacher portal',
        ]);
    }
    /**
     * @Route("/typing-tutor", methods={"GET"}, name="typing_tutor_index")
     */
    public function typingtutor(Request $request): Response
    {
        return $this->render('entertaiment/home/typingtutor.html.twig', [
            'menu' => 'typing tutor',
        ]);
    }
}
