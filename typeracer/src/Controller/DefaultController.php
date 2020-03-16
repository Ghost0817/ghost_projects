<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ExersiceRepository;
use App\Repository\LobbiesRepository;
use App\Entity\Lobbies;
use App\Entity\Exersice;

class DefaultController extends AbstractController
{
    /**
     * @Route("/{reactRouting}", name="home", defaults={"reactRouting": null})
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/api/lobby", name="lobby")
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function lobby(Request $request, LobbiesRepository $lobbies, ExersiceRepository $exersice)
    {
        $result = [];
        $method = $request->getMethod();

        #if($method == 'POST') {

            $lobby_id = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36),0, 10);
            $e = $exersice->findExersice();

            $lobby = new Lobbies();

            if($request->request->get('rt') != null) {
                $lobby->setCode($request->request->get('rt'));
            } else {
                $lobby->setCode($lobby_id);
            }
            #$leader = ($lobbies->findOneBy(['code'=>$request->query->get('rt')]))->getLeader();
            if(($lobbies->findOneBy(['code'=>$request->request->get('rt')])) == null) {
                $lobby->setLeader($request->request->get('session_id'));
            } else {
                $lobby->setLeader(($lobbies->findOneBy(['code'=>$request->request->get('rt')]))->getLeader());
            }
            
            $lobby->setUser($request->request->get('session_id'));
            $lobby->setStarted(0);
            $lobby->setFinished(0);
            $lobby->setSpeed(0);

            if($request->request->get('rt') != null) {
                $lobby->setExersice(($lobbies->findOneBy(['code'=>$request->request->get('rt')]))->getExersice());
            } else {
                $lobby->setExersice($e);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($lobby);
            $em->flush();
            $result = [
                'lobby' => $lobby->getCode(),
                'leader' => $lobby->getLeader(),
                'user' => $lobby->getUser(),
                'speed' => $lobby->getSpeed(),
                'started' => $lobby->getStarted(),
                'finished' => $lobby->getFinished(),
                'started_at' => $lobby->getStartedAt(),
                'finished_at' => $lobby->getFinishedAt(),
                'exersice' => $lobby->getExersice()->getContent()
            ];
        #}
        
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent(json_encode($result));
        return $response;
    }

    /**
     * @Route("/api/profile", name="session")
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function profile()
    {
        $users = ['session_id' => uniqid()];
        $response = new Response();

        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setContent(json_encode($users));
        
        return $response;
    }

    /**
     * @Route("/api/roomstatus", name="roomstatus")
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getUsers(Request $request, LobbiesRepository $lobbies)
    {
        $users = [];

        $lobby = $lobbies->findExistLobby($request->request->get('rt'));
        #dump($lobby);die();
        foreach ($lobby as $item) {
            array_push($users, [
                'lobby' => $item->getCode(),
                'leader' => $item->getLeader(),
                'user' => $item->getUser(),
                'speed' => $item->getSpeed(),
                'started' => $item->getStarted(),
                'finished' => $item->getFinished(),
                'started_at' => $item->getStartedAt(),
                'finished_at' => $item->getFinishedAt(),
                'exersice' => $item->getExersice()->getContent()
            ]);
        }
    
        $response = new Response();

        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setContent(json_encode($users));
        
        return $response;
    }
    
}
