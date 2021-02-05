<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\voiture;


class ConnectionController extends AbstractController
{
    /**
     * @Route("/connection", name="connection")
     */
    public function index() : Response
    {
 try
  {        $em= $this->getDoctrine()->getManager();
        $em->getConnection()->connect();
        $connected = $em->getConnection()->isConnected();
        
        return $this->render('connection/index.html.twig', [
        'connected' => $connected

        ]);
  }




 catch(\Exception $e)
  {
    return $this->render('connection/index.html.twing');
  }    
 }
}