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
    { /*Esta página es la principal de la aplicación. Para poder acceder deberemos escribir http://localhost:8000/contacto */
        return $this->render('contacto/index.html.twig');
    }

    /**
     * @Route("/new", name="contacto_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {   /*Esta ruta nos crea el formulario y manda todo lo creado desde ContactoType al html. Si creamos el contacto nos redirecciona a la pagina propia de cada contacto que acabamos de crear. */
        $contacto = new Contacto();
        $form = $this->createForm(ContactoType::class, $contacto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contacto);
            $entityManager->flush();
            
            return $this->redirectToRoute('contacto_show', ['id' =>$contacto -> getId(),]);
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
    {   /*Esta ruta renderiza el contacto y lo coge con el valor de su id y nos muestra los datos en el show.html */
        return $this->render('contacto/show.html.twig', [
            'contacto' => $contacto,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="contacto_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Contacto $contacto): Response
    {   /* Esta ruta nos permite editar el contacto y nos redirecciona al contacto que acabamos de editar.*/
        $form = $this->createForm(ContactoType::class, $contacto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contacto_show', ['id' =>$contacto -> getId(),]);
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
    {    /*Esto nos borra el contacto y nos devuelve a la lista de contactos. */
        
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contacto);
            $entityManager->flush();
        

        return $this->redirectToRoute('list', ['type' =>$contacto -> getTipo(),]);
    }


    /**
     * @Route("/list/{type}", name="list")
     */
    public function list(Request $request, $type):Response{
        /*Esto nos muestra la lista de contactos y la filtra según el tipo de contactos. Para ello usamos varios condicionantes.*/
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