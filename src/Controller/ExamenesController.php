<?php

namespace App\Controller;

use App\Entity\Consulta;
use App\Entity\Examenes;
use App\Entity\Pacientes;
use App\Form\ExamenesType;
use App\Repository\ConsultaRepository;
use App\Repository\ExamenesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
 * @Route("/examenes")
 * @IsGranted("IS_AUTHENTICATED_FULLY",message="No tiene acceso a esta pagina")
 * 
 */
class ExamenesController extends AbstractController
{
    /**
     * @Route("/", name="examenes_index", methods={"GET"})
     */
    public function index(ExamenesRepository $examenesRepository): Response
    {
        return $this->render('examenes/index.html.twig', [
            'examenes' => $examenesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/paciente/{id}/consulta/{c}", name="examenes_new", methods={"GET","POST"})
     */
    public function new(Request $request,$id,$c,ConsultaRepository $consultaRepository): Response
    {
        $em= $this->getDoctrine()->getManager();
        $consulta= $em->getRepository(Consulta::class)->find($c);
        $paciente= $em->getRepository(Pacientes::class)->find($id);
        $c= $consultaRepository->consulta_examene($consulta->getId());
        $c2= $consultaRepository->consulta_examene_full($paciente->getId());
        $examene = new Examenes();
        $form = $this->createForm(ExamenesType::class, $examene);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $examene->setConsulta($consulta);
            $entityManager->persist($examene);
            $entityManager->flush();
            $this->addFlash('exito','Registro Guardado con Éxito');

            return $this->redirect($request->getUri());
        }

        return $this->render('examenes/new.html.twig', [
            'consulta'=>$consulta,
            'paciente'=>$paciente,
            'c'=>$c,
            'c2'=>$c2,
            'examene' => $examene,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="examenes_show", methods={"GET"})
     */
    public function show(Examenes $examene): Response
    {
        return $this->render('examenes/show.html.twig', [
            'examene' => $examene,
        ]);
    }

    /**
     * @Route("/paciente/{p}/consulta/{c}/{id}/edit", name="examenes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Examenes $examene,$p,$c): Response
    {
        $em= $this->getDoctrine()->getManager();
        
        $paciente= $em->getRepository(Pacientes::class)->find($p);
        $consulta= $em->getRepository(Consulta::class)->find($c);
        $form = $this->createForm(ExamenesType::class, $examene);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirect($request->getUri());
          
        }

        return $this->render('examenes/edit.html.twig', [
            'consulta'=>$consulta,
            'paciente'=>$paciente,
            'examene' => $examene,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delate_examen")
     * @Method({"DELETE"})
     */
    public function delete($id)
    {
        $antecedente= $this->getDoctrine()->getRepository(Examenes::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($antecedente);
        $entityManager->flush();
        $response = new Response();
        $response->send();
    }
}
