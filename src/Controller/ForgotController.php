<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Employed;
use App\Form\ChangePasswordType;
use App\Repository\EmployedRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ForgotController extends  Controller
{
    /**
     * @Route("/forgot", name="forgot")
     */
    public function index(Request $request, 
    UserPasswordEncoderInterface $encoder, 
    EmployedRepository $employedRepository): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $userInfo = ['username' => null, 'plainPassword' => null];
        $form = $this->createForm(ChangePasswordType::class, $userInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $userInfo = $form->getData();
            $username = $userInfo['username'];
            $plainPassword = $userInfo['plainPassword'];

            $user = $employedRepository->findOneBy(['username' => $username]);
            if ($user === null) {
                $this->addFlash('danger', 'Usuario invalido');
                return $this->redirectToRoute('forgot');
            }
            $password = $encoder->encodePassword($user, $plainPassword);

            $user->setPassword($password);
            $entityManager->flush();

            return $this->redirectToRoute('app_login');
        }

        return $this->render('security/forgot.html.twig', array('form' => $form->createView()));






    }

      
    
}
