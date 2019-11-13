<?php

namespace App\Controller\Admin;

use App\Entity\Optionn;
use App\Form\OptionnType;
use App\Repository\OptionnRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/optionn")
 */
class AdminOptionnController extends AbstractController
{
    /**
     * @Route("/", name="admin.optionn.index", methods={"GET"})
     */
    public function index(OptionnRepository $OptionnRepository): Response
    {
        return $this->render('admin/optionn/index.html.twig', [
            'optionns' => $OptionnRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin.optionn.new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $optionn = new Optionn();
        $form = $this->createForm(OptionnType::class, $optionn);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($optionn);
            $entityManager->flush();

            return $this->redirectToRoute('admin.optionn.index');
        }

        return $this->render('admin/optionn/new.html.twig', [
            'optionn' => $optionn,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{id}/edit", name="admin.optionn.edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Optionn $optionn): Response
    {
        $form = $this->createForm(OptionnType::class, $optionn);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin.optionn.index');
        }

        return $this->render('admin/optionn/edit.html.twig', [
            'optionn' => $optionn,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin.optionn.delete", methods={"DELETE"})
     */
    public function delete(Request $request, Optionn $optionn): Response
    {
    
        if ($this->isCsrfTokenValid('admin/delete'.$optionn->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($optionn);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin.optionn.index');
    }
}
