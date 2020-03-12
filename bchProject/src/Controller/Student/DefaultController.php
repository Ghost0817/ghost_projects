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
use App\Repository\StudentLoggedRepository;
use App\Repository\ActivedcourseRepository;
use App\Repository\CategoryRepository;
use App\Repository\LessonRepository;
use App\Entity\Lang;

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
    public function index(Request $request, LangRepository $langsRep, StudentLoggedRepository $SLrep): Response
    {
        if($this->getUser() && true === $this->isGranted('ROLE_STUDENT'))
        {
            $user = $this->getUser();
            $user->setLastActivityAt(new \DateTime('now'));
            $user->setLastAction('COURSE');
            $em->persist($user);
            $em->flush();

            if ($request->hasSession() && ($session = $request->getSession())) {

                $hasSess = $SLrep->findOneBy(array('sessId' => $request->getSession()->getId()));
                if(!$hasSess){
                    $SL = new StudentLogged();
                    $SL->setSessId($request->getSession()->getId());
                    $SL->setStudent($user);
                    $SL->setSessDate(new \DateTime('now'));

                    $em->persist($SL);
                    $em->flush();
                }
                //StudentLogged->set
            }
        }
        $langs = $langsRep->findAll();
        return $this->render('student/course/index.html.twig', [
            'entities' => $langs,
            "menu"     => 1
        ]);
    }

    /**
     * @Route("/lesson/{lang}/", name="tutor_course")
     */
    public function course(Request $request,
    Lang $lang, 
    CategoryRepository $cateRep, 
    ActivedcourseRepository $activRep,
    LessonRepository $lessonRep)
    {
        $usr = $this->getUser();

        $entities = $cateRep->findViewCategory($lang, $usr);

        $sbentities = null;
        $as = null;

        if (!is_null($usr)) {
            $user = $this->getUser();
            $user->setLastActivityAt(new \DateTime());
            $user->setLastAction('COURSE');

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $as = $activRep->findOneBy(array('student' => $user, 'lang' => $langs));

            $sbentities = $lessonRep->findViewLessonListWithStatus($usr->getId());
            $data = array();
            foreach ($sbentities as $key) {
              if( $key['alltyped'] != null && $key['seconds'] != null && $key['errors'] != null ) {
                $key['netSpeed'] = $this->calculateSpeed($usr->getMeasureSpeed(), $key['alltyped'], $key['seconds'], $key['errors']);
              }
              array_push( $data, $key);
            }
            $sbentities = $data;
        }
        else{
          $sbentities = $lessonRep->findViewLessonList();
        }

        return $this->render('student/course/course.html.twig', [
            'lang' => $lang,
            'entities' => $entities,
            'subentities' => $sbentities,
            'activedc' => $as,
            'menu'=>1
        ]);
    }

    /**
     * @Route("lesson/{lang}/open/{slug}", name="tutor_course_to")
     */
    public function courseto(Lang $lang, $slug, CategoryRepository $cateRep, ActivedcourseRepository $activRep, LessonRepository $lessonRep)
    {
        $usr = $this->getUser();
        $entities = $cateRep->findViewCategory($lang, $usr);
        $sbentities = null;
        $as = null;
        if (!is_null($usr)) {
            $user = $this->getUser();
            $user->setLastActivityAt(new \DateTime());
            $user->setLastAction('COURSE');

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $sbentities = $lessonRep->findViewLessonListWithStatus($usr->getId());

            $as = $activRep->findOneBy(array('student' => $user, 'lang' => $lang));

            $data = array();
            foreach ($sbentities as $key) {
              if( $key['alltyped'] != null && $key['seconds'] != null && $key['errors'] != null ) {
                $key['netSpeed'] = $this->calculateSpeed($usr->getMeasureSpeed(), $key['alltyped'], $key['seconds'], $key['errors']);
              }
              array_push( $data, $key);
            }
            $sbentities = $data;
        }
        else {
          $sbentities = $lessonRep->findViewLessonList();
        }

        return $this->render('student/course/courseto.html.twig', [
            'lang' => $lang,
            'entities' => $entities,
            'subentities' => $sbentities,
            'activedc' => $as,
            'menu'=>1
        ]);
    }

    public function calculateSpeed($type, $characters, $seconds, $errors){
        $words = 0;
        $minutes = 0;
        $speed = null;
  
        if($type == "kph"){
          $speed = round($characters/$seconds*3600);
        } elseif ($type == "wpm") {
          $words = ($characters - ($errors * 5))/5;		// begin WPM calculation
          $minutes = $seconds/60;
          $speed = max(round($words/$minutes),0);
        } else {
          $words = ($characters - ($errors * 5));		// begin WPM calculation
                $minutes = $seconds/60;
                $speed = max(round($words/$minutes),0);
        }
        return ($speed == null)?100:$speed;
    }
}
