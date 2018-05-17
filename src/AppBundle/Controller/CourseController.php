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

        return $this->render('courses/course.html.twig');
    }

}