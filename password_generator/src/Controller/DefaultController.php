<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     * @Route("/{_locale}/", name="homepage_local", defaults={
     *     "_locale": "en"
     * }, requirements={
     *     "_locale": "mn|en"
     * })
     *
     */
    public function homepage()
    {
        return $this->render('default/index.html.twig', array(
        ));
    }

    /**
     * @Route("/{_locale}/cookies-policy", name="cookiespolicy", defaults={
     *     "_locale": "en"
     * }, requirements={
     *     "_locale": "mn|en"
     * })
     *
     */
    public function cookiespolicy()
    {
        return $this->render('default/cookiespolicy.html.twig', array(
        ));
    }

    /**
     * @Route("/{_locale}/privacy-policy", name="privacypolicy", defaults={
     *     "_locale": "en"
     * }, requirements={
     *     "_locale": "mn|en"
     * })
     *
     */
    public function privacypolicy()
    {
        return $this->render('default/privacypolicy.html.twig', array(
        ));
    }
}