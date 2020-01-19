<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class FailbrowserController extends AbstractController
{
    /**
     * @Route("failbrowser", name="failbrowser")
     */
    public function index(AuthenticationUtils $authenticationUtils): Response
    {

		return $this->render('failbrowser/index.html.twig', ['menu' => 'failbrowser']);
    }
}
