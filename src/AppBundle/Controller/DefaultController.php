<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Equipe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $equipes = $em->getRepository('AppBundle:Equipe')->findAll();
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig',array(
            'equipes' => $equipes, [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]));
    }
}
