<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Equipe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Circuit controller.
 *
 * @Route("circuit")
 */
class CircuitController extends Controller
{
    /**
     * Lists all circuits.
     *
     * @Route("/", name="circuit")
     * @Method("GET")
     */
    public function circuitAction()
    {

        return $this->render('circuit/circuit.html.twig');
    }

}