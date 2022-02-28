<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\AnnonceType;
use App\Entity\Annonce;
use Symfony\Component\HttpFoundation\Request;

class AnnonceController extends AbstractController
{
    /**
     * @Route("listeannonce", name="ListeAnnonce")
     */
    public function ListeAnnonce() : Response {
        $listeAnnonce = $this->GetDoctrine()->GetRepository(Annonce::class)->findAll();
        return $this->render('listeannonce.html.twig', ['listeAnnonce' => $listeAnnonce]);
    }

    /**
     * @Route("detailannonce/{id}", requirements = {"parametre"="\[0-9]"}, name="detailAnnonce")
     */
    public function DetailAnnonce(Request $requete, $id) : Response {
        $annonce = $this->GetDoctrine()->GetRepository(Annonce::class)->find($id);
        return $this->render('detailannonce.html.twig', ['annonce' => $annonce]);
    }

    /**
     * @Route("ajouterannonce", name="ajouterAnnonce")
     */
    public function AjouterAnnonce(Request $request) : Response {
        $annonce = new Annonce();

        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message = $form->getData();

            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($message);
            $doctrine->flush($message);
        }

        return $this->render('ajouterannonce.html.twig', ['form' => $form->createView() ]);
    }

    /**
     * @Route("modifierannonce/{id}", requirements = {"parametre"="\[0-9]"}, name="modifierAnnonce")
     */
    public function ModifierAnnonce(Request $request, $id) : Response {
        $annonce = $this->GetDoctrine()->GetRepository(Annonce::class)->find($id);

        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message = $form->getData();

            $entity = $this->getDoctrine()->getManager();
            $entity->remove($annonce);
            $entity->persist($message);
            $entity->flush();
            return $this->ListeAnnonce();
        }

        return $this->render('ajouterannonce.html.twig', ['form' => $form->createView() ]);
    }

    /**
     * @Route("supprimerannonce/{id}", requirements = {"parametre"="\[0-9]"}, name="supprimerAnnonce")
     */
    public function SupprimerAnnonce(Request $request, $id) : Response {
        $annonce = $this->GetDoctrine()->GetRepository(Annonce::class)->find($id);

        $entity = $this->getDoctrine()->getManager();
        $entity->remove($annonce);
        $entity->flush($annonce);

        return $this->ListeAnnonce();
    }
}
?>