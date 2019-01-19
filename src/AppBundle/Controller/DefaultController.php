<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Advert;

class DefaultController extends Controller
{

    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    public function viewAction()
    {
        $stop = true;
        $advert = new Advert;
        $advert->setContent("Recherche développeur Symfony3.");
        $advert->setTitle("Developpeur Symfony");
        $advert->setAuthor("Brice");
        $advert->setPublished(true);

        $em = $this->getDoctrine()->getManager();
        $advertRepository = $em->getRepository('AppBundle:Advert');
        
        
        if($stop){
            $em->persist($advert);
            $em->flush();
        }
        
        return $this->render('default/view.html.twig', array(
        'advert' => $advert
        ));
    }
}
