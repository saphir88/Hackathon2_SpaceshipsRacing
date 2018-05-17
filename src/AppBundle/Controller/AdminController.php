<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Login controller.
 *
 * @Route("admin")
 */
class AdminController extends Controller
{
    protected $errors = [];

    /**
     * Page admin
     *
     * @Route("/", name="admin_page")
     * @Method("GET")
     */
    public function admin()
    {
        if(isset($_SESSION['username'])) {
            return $this->render('admin/admin.html.twig');
        }else{
            header('location:/admin/login');
        }

    }

    /**
     * Page login
     *
     * @Route("/login", name="login")
     * @Method("GET")
     */
    public function login()
    {
        return $this->render('admin/login.html.twig');
    }

    /**
     * Page postlogin
     *
     * @Route("/postlogin", name="postlogin")
     * @Method("POST")
     */
    public function postlogin(){
        $myPseudo = 'admin';
        $myMdp = 'admin';

        if(isset($_POST['username']) && isset($_POST['password'])) {
            $pseudo = $_POST['username'];
            $mdp = $_POST['password'];
            if ($pseudo == $myPseudo && $mdp == $myMdp){
                $_SESSION['username'] = $pseudo;
                var_dump($_SESSION);
                return $this->redirectToRoute('http://symfony.com/doc');
            } else {
                $this->errors[] = "Identifiant ou mot de passe invalide";
                return $this->render("admin/login.html.twig", ['errors' => $this->errors,]);
            }
        } else {
            $this->errors[] = "Veuillez entrer vos identifiants";
            return $this->render("admin/login.html.twig", ['errors' => $this->errors,]);
        }
    }
}
