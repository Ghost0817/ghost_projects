<?php
namespace App\Controller\Typing;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\FormError;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;
use App\Form\ContactType;

class TypingController extends AbstractController
{
    /**
     * @Route("/test", name="contactus_index", defaults={
     *     "_locale": "mn"
     * }, requirements={
     *     "_locale": "mn|en"
     * })
     *
     */
    public function index(){
        return $this->render('Typing/index.html.twig', array(
        ));
    }
}
