<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class HomeController extends AbstractController
{
    private $passwordEncoder;
   public function __construct(UserPasswordEncoderInterface $passwordEncoder)
   {
      $this->passwordEncoder = $passwordEncoder;
   }

    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

     /**
     * @Route("/createuser", name="createuser")
     */
    public function createuser()
    {
        $user = new User();
        $user->setUsername('angular');
        $user->setRoles( array_unique( ['ROLE_user']) );
        $password = $this->passwordEncoder->encodePassword($user, 'angular2020');
        $user->setPassword($password);    
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();
    }
}
