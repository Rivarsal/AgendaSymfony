<?php

namespace App\Controller;

use App\Entity\Contacto;
use App\Form\ContactoType;
use App\Repository\ContactoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contacto")
 */
class ContactoController extends AbstractController
{
    /**
     * @Route("/", name="contacto_index", methods={"GET"})
     */
    public function index(ContactoRepository $contactoRepository): Response
    {
        return $this->render('contacto/index.html.twig');
    }

    /**
     * @Route("/new", name="contacto_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $contacto = new Contacto();
        $form = $this->createForm(ContactoType::class, $contacto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contacto);
            $entityManager->flush();

            return $this->redirectToRoute('contacto_index');
        }

        return $this->render('contacto/new.html.twig', [
            'contacto' => $contacto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contacto_show", methods={"GET"})
     */
    public function show(Contacto $contacto): Response
    {
        return $this->render('contacto/show.html.twig', [
            'contacto' => $contacto,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="contacto_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Contacto $contacto): Response
    {
        $form = $this->createForm(ContactoType::class, $contacto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contacto_index');
        }

        return $this->render('contacto/edit.html.twig', [
            'contacto' => $contacto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="contacto_delete", methods={"GET","DELETE"})
     */
    public function delete(Request $request, Contacto $contacto): Response
    {
        
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contacto);
            $entityManager->flush();
        

        return $this->redirectToRoute('contacto_index');
    }


    /**
     * @Route("/list/{type}", name="list")
     */
    public function list(Request $request, $type):Response{
        if($type == 'global'){
            $contacto = $this->getDoctrine()
            ->getRepository(Contacto::class)
            ->findAll();

        }else{
            $contacto = $this->getDoctrine()
            ->getRepository(Contacto::class)
            ->findBy(['Tipo' => $type]);
        }
            return $this->render('contacto/list.html.twig',[
            'list'=>$contacto,
            'type'=>$type,
        ]);
}
}