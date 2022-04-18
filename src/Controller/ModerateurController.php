<?php

namespace App\Controller;
use App\Form\PersonneType;
use App\Entity\Personne;
use App\Repository\PersonneRepository;
use App\Entity\Moderateur;
use App\Form\Moderateur1Type;
use App\Repository\ModerateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/moderateur")
 */
class ModerateurController extends AbstractController
{
    /**
     * @Route("/", name="app_moderateur_index", methods={"GET"})
     */
    public function index(ModerateurRepository $moderateurRepository): Response
    {
        return $this->render('moderateur/index.html.twig', [
            'moderateurs' => $moderateurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_moderateur_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ModerateurRepository $moderateurRepository, PersonneRepository $personneRepository): Response
    {
        $personne = new Personne();
        $form = $this->createForm(PersonneType::class, $personne);
        $form->handleRequest($request);
        $moderateur = new Moderateur();
        


        if ($form->isSubmitted() && $form->isValid()) {
            $personneRepository->add($personne);
            $moderateur->setIdModerateur($personne);
            $moderateurRepository->add($moderateur);
            return $this->redirectToRoute('app_moderateur_index', [], Response::HTTP_SEE_OTHER);
        }
        
        $em = $this->getDoctrine()->getManager();
        
             return $this->render('moderateur/new.html.twig', [
            'moderateur' => $moderateur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idModerateur}", name="app_moderateur_show", methods={"GET"})
     */
    public function show(Moderateur $moderateur): Response
    {
        return $this->render('moderateur/show.html.twig', [
            'moderateur' => $moderateur,
        ]);
    }

    /**
     * @Route("/{idModerateur}/edit", name="app_moderateur_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Moderateur $moderateur, ModerateurRepository $moderateurRepository): Response
    {
        $form = $this->createForm(PersonneType::class, $moderateur->getIdModerateur());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $moderateurRepository->add($moderateur);
            return $this->redirectToRoute('app_moderateur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('moderateur/edit.html.twig', [
            'moderateur' => $moderateur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idModerateur}", name="app_moderateur_delete", methods={"POST"})
     */
    public function delete(Request $request, Moderateur $moderateur, ModerateurRepository $moderateurRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$moderateur->getIdModerateur(), $request->request->get('_token'))) {
            $moderateurRepository->remove($moderateur);
        }

        return $this->redirectToRoute('app_moderateur_index', [], Response::HTTP_SEE_OTHER);
    }





}
