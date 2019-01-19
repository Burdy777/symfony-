<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Advert;

class AdvertController extends Controller
{

    public function setAdvertAction() { 
      $advert = new Advert();
      $advert->setTitle('Recherche développeur Symfony.');
      $advert->setAuthor('Alexandre');
      $advert->setContent("Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…");
  
      $em = $this->getDoctrine()->getManager();
      $em->persist($advert);
      $em->flush();
  
   
        return $this->render('default/advert.html.twig', array('advert' => $advert));
    }

    public function getAdvertAction() { 
      $repository = $this->getDoctrine()
      ->getManager()
      ->getRepository('AppBundle:Advert');
      $advert = $repository->find(5);
      if($advert === null) {
        throw new NotFoundHttpException("L'annonce d'id 5 n'existe pas.");
      }
        return $this->render('default/advert.html.twig', array('advert' => $advert));
    }
}
