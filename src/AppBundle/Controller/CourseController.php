<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Equipe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Course controller.
 *
 * @Route("course")
 */
class CourseController extends Controller
{
    /**
     * Lists all courses.
     *
     * @Route("/", name="course")
     * @Method("GET")
     */
    public function courseAction()
    {
        $em = $this->getDoctrine()->getManager();

        $equipes = $em->getRepository('AppBundle:Equipe')->findAll();

        $groupe1 = [$equipes[0],$equipes[1],$equipes[2],$equipes[3],$equipes[4],$equipes[5]];
        $groupe2 = [$equipes[6],$equipes[7],$equipes[8],$equipes[9],$equipes[10],$equipes[11]];

        $randGroupe1= array_rand($groupe1,3);

        $randGroupe2 = array_rand($groupe2,3);
        //var_dump($randGroupe2);




        return $this->render('courses/course.html.twig',array(
            'equipes' => $equipes,
            'randGroupe1' => $randGroupe1,
            'randGroupe2' => $randGroupe2
            ));
    }

}