<?php

namespace App\Controller;

use App\Entity\LaRonde;
use App\Form\LaRondeType;
use App\Repository\LaRondeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/la/ronde")
 */
class LaRondeController extends AbstractController
{
    /**
     * @Route("/", name="app_la_ronde_index", methods={"GET"})
     */
    public function index(LaRondeRepository $laRondeRepository): Response
    {
        return $this->render('la_ronde/index.html.twig', [
            'la_rondes' => $laRondeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_la_ronde_new", methods={"GET", "POST"})
     */
    public function new(Request $request, LaRondeRepository $laRondeRepository): Response
    {
        $laRonde = new LaRonde();
        $form = $this->createForm(LaRondeType::class, $laRonde);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           /* $ag = $laRonde->getAgent();
            $mat = $laRonde->getMateriel();
            $site = $laRonde->getSite();
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($ag);
            $manager->persist($mat);
            $manager->persist($site);
            //$manager->flush();
            $laRonde->setAgent($ag);
            $laRonde->setMateriel($mat);
            $laRonde->setSite($site);
            dd($laRonde);
            $manager->persist($laRonde);
            $manager->flush();*/
           // dd($laRonde->getMateriel());
            $laRondeRepository->add($laRonde, true);

            return $this->redirectToRoute('app_la_ronde_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('la_ronde/new.html.twig', [
            'la_ronde' => $laRonde,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_la_ronde_show", methods={"GET"})
     */
    public function show(LaRonde $laRonde): Response
    {
        return $this->render('la_ronde/show.html.twig', [
            'la_ronde' => $laRonde,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_la_ronde_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, LaRonde $laRonde, LaRondeRepository $laRondeRepository): Response
    {
        $form = $this->createForm(LaRondeType::class, $laRonde);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $laRondeRepository->add($laRonde, true);

            return $this->redirectToRoute('app_la_ronde_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('la_ronde/edit.html.twig', [
            'la_ronde' => $laRonde,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_la_ronde_delete", methods={"POST"})
     */
    public function delete(Request $request, LaRonde $laRonde, LaRondeRepository $laRondeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$laRonde->getId(), $request->request->get('_token'))) {
            $laRondeRepository->remove($laRonde, true);
        }

        return $this->redirectToRoute('app_la_ronde_index', [], Response::HTTP_SEE_OTHER);
    }
}
