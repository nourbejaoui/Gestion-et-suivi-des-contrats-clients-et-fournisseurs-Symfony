<?php

namespace App\Controller;
use App\Entity\Facture;
use App\Form\FactureType;
use App\Repository\FactureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
 * @Route("/facture/admin")
 */
class FactureAdminController extends AbstractController
{
    /**
     * @Route("/index", name="facture_admin")
     */
    public function index(): Response
    {
        return $this->render('admin/facture/index.html.twig', [
            'factures' => 'FactureAdminController',
        ]);
    }
    /**
     * @Route("/new", name="facture_new_admin", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $facture = new Facture();
        $form = $this->createForm(FactureType::class, $facture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($facture);
            $entityManager->flush();

            return $this->redirectToRoute('facture_admin');
        }

        return $this->render('admin/facture/new.html.twig', [
            'facture' => $facture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="facture_show_admin", methods={"GET"})
     */
    public function show(Facture $facture): Response
    {
        return $this->render('admin/facture/show.html.twig', [
            'facture' => $facture,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="facture_edit_admin", methods={"GET","POST"})
     */
    public function edit(Request $request, Facture $facture): Response
    {
        $form = $this->createForm(FactureType::class, $facture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('facture_admin');
        }

        return $this->render('admin/facture/edit.html.twig', [
            'facture' => $facture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="facture_delete_admin", methods={"DELETE"})
     */
    public function delete(Request $request, Facture $facture): Response
    {
        if ($this->isCsrfTokenValid('delete'.$facture->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($facture);
            $entityManager->flush();
        }

        return $this->redirectToRoute('facture_admin');
    }
}
